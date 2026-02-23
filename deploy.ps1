# Deploy script for Agunfon
# Uses tar + scp via WSL to deploy to Linux server

$server = "adebareshowemimo@52.188.194.2"
$remotePath = "/var/www/agunfoninteractivity.com"
$localPath = "/mnt/c/xampp/htdocs/agunfon"
$archivePath = "/tmp/agunfon.tar.gz"

Write-Host "Deploying to $server`:$remotePath" -ForegroundColor Cyan

# Step 1: Create tar archive (excluding unnecessary files)
Write-Host "`n[1/3] Creating archive..." -ForegroundColor Yellow
wsl tar --exclude='vendor' --exclude='node_modules' --exclude='.git' --exclude='design-assets' `
    --exclude='storage/logs/*' --exclude='storage/framework/cache/*' `
    --exclude='storage/framework/sessions/*' --exclude='storage/framework/views/*' `
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

# Step 3: Extract on server
Write-Host "[3/3] Extracting on server..." -ForegroundColor Yellow
$extractCmd = "sudo mkdir -p $remotePath && sudo tar -xzf /tmp/agunfon.tar.gz -C $remotePath --strip-components=1 && sudo chown -R www-data:www-data $remotePath && rm /tmp/agunfon.tar.gz"
wsl ssh $server $extractCmd

if ($LASTEXITCODE -eq 0) {
    # Cleanup local archive
    wsl rm $archivePath
    
    Write-Host "`nDeployment successful!" -ForegroundColor Green
    Write-Host "`nNext steps on server:" -ForegroundColor Yellow
    Write-Host "  cd $remotePath"
    Write-Host "  cp .env.example .env && nano .env  # Configure environment"
    Write-Host "  composer install --no-dev --optimize-autoloader"
    Write-Host "  php artisan key:generate"
    Write-Host "  php artisan migrate"
    Write-Host "  php artisan config:cache"
    Write-Host "  php artisan route:cache"
} else {
    Write-Host "`nDeployment failed" -ForegroundColor Red
}
