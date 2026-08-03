#!/usr/bin/env bash
#
# Agunfon — server-side deploy.
#
# Run this ON THE SERVER, from the application root. It pulls the latest code
# from git, reinstalls dependencies, migrates, clears every cache, and reloads
# the web server.
#
#   cd /var/www/agunfoninteractivity.com
#   ./deploy.sh
#
# This is the counterpart to deploy.ps1, which pushes a tarball from a Windows
# workstation. Use whichever fits: deploy.ps1 to ship uncommitted local work,
# deploy.sh to ship what is already on origin/main.
#
# Usage:
#   ./deploy.sh                  deploy origin/main
#   ./deploy.sh -b some-branch   deploy a different branch
#   ./deploy.sh --force          discard local server-side changes and deploy anyway
#   ./deploy.sh --no-migrate     skip database migrations
#   ./deploy.sh --no-restart     skip the Apache reload
#   ./deploy.sh --dry-run        show what would change, then stop
#
set -euo pipefail

# ---------------------------------------------------------------------------
# Settings
# ---------------------------------------------------------------------------
BRANCH="${DEPLOY_BRANCH:-main}"
WEB_USER="${DEPLOY_WEB_USER:-www-data}"
WEB_GROUP="${DEPLOY_WEB_GROUP:-www-data}"
WEB_SERVICE="${DEPLOY_WEB_SERVICE:-apache2}"
PHP_BIN="${DEPLOY_PHP_BIN:-php}"

FORCE=0
RUN_MIGRATIONS=1
RESTART_WEB=1
DRY_RUN=0

while [[ $# -gt 0 ]]; do
    case "$1" in
        -b|--branch)   BRANCH="$2"; shift 2 ;;
        -f|--force)    FORCE=1; shift ;;
        --no-migrate)  RUN_MIGRATIONS=0; shift ;;
        --no-restart)  RESTART_WEB=0; shift ;;
        --dry-run)     DRY_RUN=1; shift ;;
        -h|--help)     sed -n '2,25p' "$0"; exit 0 ;;
        *)             echo "Unknown option: $1 (try --help)" >&2; exit 1 ;;
    esac
done

# Always operate on the directory the script lives in, never the caller's cwd.
APP_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
cd "$APP_DIR"

BOLD=$'\033[1m'; RED=$'\033[31m'; GREEN=$'\033[32m'
YELLOW=$'\033[33m'; CYAN=$'\033[36m'; RESET=$'\033[0m'

step() { echo -e "\n${CYAN}${BOLD}==>${RESET}${BOLD} $*${RESET}"; }
info() { echo "    $*"; }
warn() { echo -e "    ${YELLOW}! $*${RESET}"; }
ok()   { echo -e "    ${GREEN}✓${RESET} $*"; }
die()  { echo -e "\n${RED}${BOLD}✗ $*${RESET}" >&2; exit 1; }

# Use sudo only when we are not already root.
SUDO=""
if [[ "$(id -u)" -ne 0 ]]; then
    command -v sudo >/dev/null 2>&1 || die "Not root and sudo is unavailable."
    SUDO="sudo"
fi

# ---------------------------------------------------------------------------
# Preflight — fail before touching anything
# ---------------------------------------------------------------------------
step "Preflight"

[[ -f artisan ]]      || die "No 'artisan' here. Run this from the application root ($APP_DIR)."
[[ -d .git ]]         || die "$APP_DIR is not a git checkout. Use deploy.ps1 for tarball deploys."
[[ -f .env ]]         || die "No .env file. Copy .env.example and configure it before deploying."
command -v git >/dev/null      || die "git is not installed."
command -v composer >/dev/null || die "composer is not installed."

info "Directory : $APP_DIR"
info "Branch    : $BRANCH"
info "PHP       : $($PHP_BIN -r 'echo PHP_VERSION;')"
info "Running as: $(id -un)"

# The checkout is normally owned by the web user, so an unprivileged run fails
# partway through — on git reset, composer, or artisan — rather than up front.
# Catch it here with an actionable message instead.
OWNER="$(stat -c '%U' "$APP_DIR" 2>/dev/null || echo '?')"
if [[ ! -w "$APP_DIR/.git" || ! -w "$APP_DIR" ]]; then
    die "No write access to $APP_DIR (owned by '$OWNER', running as '$(id -un)').
    Re-run with:  sudo ./deploy.sh"
fi

# git refuses to operate on a repository owned by another user unless told the
# path is trusted. Add it rather than failing later with "dubious ownership".
if ! git status --porcelain >/dev/null 2>&1; then
    warn "git reports dubious ownership of $APP_DIR — marking it safe."
    git config --global --add safe.directory "$APP_DIR" || true
    git status --porcelain >/dev/null 2>&1 \
        || die "Still cannot read the git repository at $APP_DIR."
fi

# Untracked files are reported but never block: 'git reset --hard' does not
# remove them, so server-only content (uploads, one-off pages) is not at risk.
UNTRACKED="$(git ls-files --others --exclude-standard)"
if [[ -n "$UNTRACKED" ]]; then
    UNTRACKED_COUNT="$(printf '%s\n' "$UNTRACKED" | wc -l | tr -d ' ')"
    info "Untracked, not in git ($UNTRACKED_COUNT) — left untouched by this deploy:"
    printf '%s\n' "$UNTRACKED" | head -10 | sed 's/^/      /'
    [[ "$UNTRACKED_COUNT" -gt 10 ]] && info "      ... and $((UNTRACKED_COUNT - 10)) more"
    warn "These exist only on this server. Nothing backs them up — consider committing them."
fi

# Modified or deleted TRACKED files are a different matter: a hard reset silently
# destroys them, so stop and make it a decision.
DIRTY_TRACKED="$(git status --porcelain --untracked-files=no)"
if [[ -n "$DIRTY_TRACKED" ]]; then
    if [[ "$FORCE" -eq 1 ]]; then
        warn "Tracked files modified on the server — these WILL be discarded (--force):"
        printf '%s\n' "$DIRTY_TRACKED" | sed 's/^/      /'
    else
        echo
        printf '%s\n' "$DIRTY_TRACKED" | sed 's/^/      /'
        die "Tracked files were edited on the server. Commit them, or re-run with --force to discard."
    fi
fi
ok "Preflight passed"

# ---------------------------------------------------------------------------
# Fetch and preview
# ---------------------------------------------------------------------------
step "Fetching origin/$BRANCH"
git fetch --prune origin "$BRANCH"

CURRENT="$(git rev-parse HEAD)"
TARGET="$(git rev-parse "origin/$BRANCH")"

if [[ "$CURRENT" == "$TARGET" ]]; then
    NEEDS_UPDATE=0
    ok "Already at $(git rev-parse --short HEAD) — no new commits."
else
    NEEDS_UPDATE=1
    BEHIND="$(git rev-list --count "$CURRENT..$TARGET" 2>/dev/null || echo 0)"
    AHEAD="$(git rev-list --count "$TARGET..$CURRENT" 2>/dev/null || echo 0)"

    # Commits that exist only on the server are almost always a hotfix someone
    # applied in place. A hard reset would erase them with no trace, and the
    # dirty-tree check above cannot catch them because they are committed.
    if [[ "$AHEAD" -gt 0 ]]; then
        warn "This checkout has $AHEAD commit(s) that are NOT on origin/$BRANCH:"
        git log --oneline --no-decorate "$TARGET..$CURRENT" | head -10 | sed 's/^/      /'
        if [[ "$FORCE" -eq 1 ]]; then
            warn "They will be DISCARDED (--force)."
        else
            die "Refusing to discard server-only commits. Push them, or re-run with --force."
        fi
    fi

    if [[ "$BEHIND" -gt 0 ]]; then
        info "Incoming ($BEHIND commit(s)):"
        git log --oneline --no-decorate "$CURRENT..$TARGET" | head -25 | sed 's/^/      /'
    fi
fi

if [[ "$DRY_RUN" -eq 1 ]]; then
    echo
    warn "--dry-run: stopping before any changes are made."
    exit 0
fi

# ---------------------------------------------------------------------------
# Maintenance mode. The trap guarantees the site comes back up even if a later
# step fails — otherwise a bad deploy leaves visitors on a 503 indefinitely.
# ---------------------------------------------------------------------------
MAINTENANCE=0
bring_back_up() {
    local exit_code=$?
    if [[ "$MAINTENANCE" -eq 1 ]]; then
        echo
        [[ $exit_code -ne 0 ]] && warn "Deploy failed — restoring the site before exiting."
        # Try as the current user first, then escalate. Written as an explicit
        # branch because "$SUDO -u www-data ..." expands to a bare "-u" when the
        # script is already running as root, which is not a valid command.
        if "$PHP_BIN" artisan up >/dev/null 2>&1; then
            :
        elif [[ -n "$SUDO" ]] && $SUDO "$PHP_BIN" artisan up >/dev/null 2>&1; then
            :
        else
            warn "Could not disable maintenance mode. Run: php artisan up"
        fi
    fi
    exit $exit_code
}
trap bring_back_up EXIT

step "Enabling maintenance mode"
"$PHP_BIN" artisan down --retry=15 >/dev/null 2>&1 && MAINTENANCE=1 && ok "Site is in maintenance mode" \
    || warn "Could not enable maintenance mode — continuing."

# ---------------------------------------------------------------------------
# Back up the database before migrating.
# ---------------------------------------------------------------------------
step "Backing up the database"
DB_FILE="$(grep -E '^DB_DATABASE=' .env | tail -1 | cut -d= -f2- | tr -d '"'"'"'' || true)"
if [[ -z "$DB_FILE" ]]; then
    DB_FILE="$APP_DIR/database/database.sqlite"
fi

if [[ -f "$DB_FILE" ]]; then
    BACKUP_DIR="$APP_DIR/storage/backups"
    mkdir -p "$BACKUP_DIR"
    BACKUP_FILE="$BACKUP_DIR/database-$(date +%Y%m%d-%H%M%S).sqlite"
    cp "$DB_FILE" "$BACKUP_FILE"
    ok "Saved $BACKUP_FILE"
    # Keep the 10 most recent; older ones are noise.
    ls -1t "$BACKUP_DIR"/database-*.sqlite 2>/dev/null | tail -n +11 | xargs -r rm --
else
    info "No SQLite file at $DB_FILE — skipping (not using SQLite?)."
fi

# ---------------------------------------------------------------------------
# Pull code
#
# reset --hard rather than pull: the server checkout is a deployment artifact,
# not a workspace, and a merge conflict mid-deploy is far worse than a reset.
# Untracked files are left alone, so .env, storage/ and public/build survive.
# ---------------------------------------------------------------------------
step "Updating code"
if [[ "$NEEDS_UPDATE" -eq 1 ]]; then
    git checkout -q "$BRANCH" 2>/dev/null || git checkout -qB "$BRANCH" "origin/$BRANCH"
    git reset --hard "origin/$BRANCH"
    ok "Now at $(git rev-parse --short HEAD) — $(git log -1 --pretty=%s)"
else
    info "Nothing to pull; continuing so caches and dependencies are still refreshed."
fi

# ---------------------------------------------------------------------------
# Dependencies
# ---------------------------------------------------------------------------
step "Installing PHP dependencies"
COMPOSER_ALLOW_SUPERUSER=1 composer install \
    --no-dev --optimize-autoloader --no-interaction --prefer-dist
ok "composer install complete"

# ---------------------------------------------------------------------------
# Migrations
# ---------------------------------------------------------------------------
if [[ "$RUN_MIGRATIONS" -eq 1 ]]; then
    step "Running migrations"
    "$PHP_BIN" artisan migrate --force --no-interaction
    ok "Migrations complete"
else
    step "Running migrations"
    warn "Skipped (--no-migrate)"
fi

# ---------------------------------------------------------------------------
# Storage symlink — public/storage is gitignored, so it will not exist on a
# fresh checkout.
# ---------------------------------------------------------------------------
step "Checking storage symlink"
if [[ -L public/storage || -d public/storage ]]; then
    ok "public/storage already present"
else
    "$PHP_BIN" artisan storage:link && ok "Created public/storage"
fi

# ---------------------------------------------------------------------------
# Caches
#
# optimize:clear clears config, route, view, event and application caches in one
# pass. The application cache matters more than usual here: CACHE_STORE=database
# and LaRecipe caches every rendered documentation page, so without this a docs
# edit silently keeps serving the old page (or a stale 404).
#
# Deliberately NOT run:
#   route:cache   — routes/web.php uses closure routes (41 of them). Caching
#                   fails outright with "Unable to prepare route for serialization".
#   config:cache  — RecaptchaService::credentialsPath() reads env() directly at
#                   runtime. Under a cached config env() returns null, which
#                   silently disables reCAPTCHA on the contact and demo forms.
#                   Safe to enable once that call moves into config/services.php.
# ---------------------------------------------------------------------------
step "Clearing caches"
"$PHP_BIN" artisan optimize:clear
ok "Cleared config, route, view, event and application caches"

# Precompiling Blade templates is safe and saves the first-hit compile.
"$PHP_BIN" artisan view:cache >/dev/null && ok "Blade templates precompiled"

# ---------------------------------------------------------------------------
# Queue workers — QUEUE_CONNECTION=database and the contact/demo mailers are
# queued. Long-running workers hold the OLD code in memory until told to stop.
# ---------------------------------------------------------------------------
step "Restarting queue workers"
"$PHP_BIN" artisan queue:restart >/dev/null 2>&1 \
    && ok "Signalled workers to restart" \
    || warn "Could not signal queue workers."

# ---------------------------------------------------------------------------
# Permissions — composer and git run as root/deploy user, so hand ownership
# back to the web user or Laravel cannot write logs, sessions or the cache.
# ---------------------------------------------------------------------------
step "Fixing permissions"
$SUDO chown -R "$WEB_USER:$WEB_GROUP" "$APP_DIR"
$SUDO chmod -R ug+rwX "$APP_DIR/storage" "$APP_DIR/bootstrap/cache"
ok "Owned by $WEB_USER:$WEB_GROUP"

# ---------------------------------------------------------------------------
# Web server — a reload also drops stale OPcache entries.
# ---------------------------------------------------------------------------
if [[ "$RESTART_WEB" -eq 1 ]]; then
    step "Reloading $WEB_SERVICE"
    if $SUDO systemctl reload "$WEB_SERVICE" 2>/dev/null; then
        ok "Reloaded (graceful, no dropped connections)"
    elif $SUDO systemctl restart "$WEB_SERVICE" 2>/dev/null; then
        ok "Restarted"
    else
        warn "Could not reload $WEB_SERVICE — do it manually."
    fi
else
    step "Reloading $WEB_SERVICE"
    warn "Skipped (--no-restart)"
fi

# ---------------------------------------------------------------------------
# Done — the EXIT trap lifts maintenance mode.
# ---------------------------------------------------------------------------
step "Verifying"
"$PHP_BIN" artisan about --only=environment 2>/dev/null | sed 's/^/    /' || true

echo
echo -e "${GREEN}${BOLD}Deploy complete.${RESET}"
echo -e "  Commit : $(git rev-parse --short HEAD) — $(git log -1 --pretty=%s)"
echo -e "  Branch : $BRANCH"
echo
echo "  Post-deploy checks:"
echo "    curl -sI https://agunfoninteractivity.com | head -1"
echo "    curl -s  https://agunfoninteractivity.com/sitemap.xml | grep -c '<loc>'   # expect 85"
echo "    curl -s  https://agunfoninteractivity.com/llms.txt | head -3"
