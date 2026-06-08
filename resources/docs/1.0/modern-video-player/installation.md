# Installation & Upgrade

---

- [Install (ZIP upload)](#zip)
- [Install (Git / manual)](#manual)
- [Upgrading from the free edition](#upgrade)
- [After installing](#after)
- [Uninstalling](#uninstall)

<a name="zip"></a>
## Install (ZIP upload)

1. Sign in as a site administrator.
2. Go to **Site administration → Plugins → Install plugins**.
3. Upload the Premium `mod_modernvideoplayer` ZIP.
4. Click **Install plugin from the ZIP file** and follow the upgrade prompts.
5. Review the new settings (see [After installing](#after)).

<a name="manual"></a>
## Install (Git / manual)

Place the plugin in your Moodle `mod/` directory so the path is:

```
<moodleroot>/mod/modernvideoplayer
```

Then visit **Site administration → Notifications** (or run the CLI upgrade) to complete the database upgrade:

```bash
php admin/cli/upgrade.php
```

> {warning} The folder **must** be named `modernvideoplayer` — Moodle derives the component name `mod_modernvideoplayer` from it.

<a name="upgrade"></a>
## Upgrading from the free edition

Premium is an **in-place upgrade** over the free Community edition. Because both share the component `mod_modernvideoplayer` and Premium carries a higher version number, Moodle runs a normal plugin upgrade.

**Preserved during upgrade:** existing activities, uploaded files, progress records, validated watched segments, completion state, gradebook entries, captions, bookmarks, reports, privacy data, and backup/restore data.

Steps:

1. **Back up first** (database + `moodledata`) — standard practice before any plugin upgrade.
2. Install the Premium build over the existing one using either method above.
3. Complete the upgrade via **Notifications** / CLI.
4. Configure the new Premium settings — they are **off or conservative by default** so nothing changes for learners until you opt in.

<a name="after"></a>
## After installing

Find the settings at:

**Site administration → Plugins → Activity modules → Modern video player**

Recommended first pass:

- Confirm activity defaults (required watch %, autoplay, captions).
- Decide which Premium feature groups to enable — analytics, content protection, sources, cloud, standards. See the [Admin Settings Reference](/{{route}}/{{version}}/modern-video-player/admin-settings).
- If you'll use scheduled instructor digests or xAPI, confirm **cron is running**.

<a name="uninstall"></a>
## Uninstalling

Uninstall from **Site administration → Plugins → Plugins overview → Modern video player → Uninstall**. This removes the plugin and its data. Export any reports or [audit data](/{{route}}/{{version}}/modern-video-player/exports-and-integrations) you need to keep **before** uninstalling.
