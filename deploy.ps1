# Deploy script for Agunfon
# Uses tar + scp via WSL to deploy to Linux server

$server = "adebareshowemimo@52.188.194.2"
$remotePath = "/var/www/agunfoninteractivity.com"
$localPath = "/mnt/c/xampp/htdocs/agunfon"
$archivePath = "/tmp/agunfon.tar.gz"

Write-Host "Deploying to $server`:$remotePath" -ForegroundColor Cyan

# Step 1: Create tar archive (excluding unnecessary files)
# NOTE: database/database.sqlite is excluded so a deploy never overwrites the
# production database with the local copy (that would wipe real submissions).
Write-Host "`n[1/3] Creating archive..." -ForegroundColor Yellow
wsl tar --exclude='vendor' --exclude='node_modules' --exclude='.git' --exclude='design-assets' `
    --exclude='storage/logs/*' --exclude='storage/framework/cache/*' `
    --exclude='storage/framework/sessions/*' --exclude='storage/framework/views/*' `
    --exclude='database/database.sqlite' `
    --exclude='.env' -czf $archivePath -C /mnt/c/xampp/htdocs agunfon

if ($LASTEXITCODE -ne 0) {
    Write-Host "Failed to create archive" -ForegroundColor Red
    exit 1
}

# Step 2: Upload via scp
Write-Host "[2/3] Uploading archive..." -ForegroundColor Yellow
wsl scp $archivePath "${server}:/tmp/"

if ($LASTEXITCODE -ne 0) {
    Write-Host "Failed to upload archive" -ForegroundColor Red
    exit 1
}

# Step 3: Extract on server and run post-deploy steps
# Installs deps (vendor is excluded from the archive), runs migrations, clears
# stale caches, fixes ownership to the web user, and restarts Apache so the new
# code/views and OPcache take effect. Routes are intentionally NOT cached
# (route:cache) because this app uses closure-based routes.
Write-Host "[3/3] Extracting + running post-deploy on server..." -ForegroundColor Yellow
$extractCmd = @"
set -e
sudo mkdir -p $remotePath
sudo tar -xzf /tmp/agunfon.tar.gz -C $remotePath --strip-components=1
rm /tmp/agunfon.tar.gz
cd $remotePath
sudo COMPOSER_ALLOW_SUPERUSER=1 composer install --no-dev --optimize-autoloader
sudo php artisan migrate --force
sudo php artisan optimize:clear
sudo chown -R www-data:www-data $remotePath
sudo systemctl restart apache2
"@
wsl ssh $server $extractCmd

if ($LASTEXITCODE -eq 0) {
    # Cleanup local archive
    wsl rm $archivePath

    Write-Host "`nDeployment successful!" -ForegroundColor Green
    Write-Host "Composer install, migrations, cache clear, chown www-data, and Apache restart all ran on the server." -ForegroundColor Green
    Write-Host "`nFirst-time setup only (not needed for normal deploys):" -ForegroundColor Yellow
    Write-Host "  cd $remotePath"
    Write-Host "  cp .env.example .env && nano .env   # configure environment"
    Write-Host "  sudo php artisan key:generate"
} else {
    Write-Host "`nDeployment failed" -ForegroundColor Red
}
