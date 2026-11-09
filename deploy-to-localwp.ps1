# Quadro Portfolio - PowerShell Deploy Script for LocalWP
Write-Host "===============================================================" -ForegroundColor Cyan
Write-Host " QUADRO PORTFOLIO - DEPLOY THEME TO LOCALWP" -ForegroundColor Cyan
Write-Host "===============================================================" -ForegroundColor Cyan
Write-Host ""

$localwpDir = Join-Path $env:USERPROFILE "Local Sites\quadro-portfolio"
$themeTarget = Join-Path $localwpDir "app\public\wp-content\themes\quadro-portfolio"

if (-not (Test-Path $localwpDir)) {
    Write-Host "[ERROR] LocalWP site folder was not found at: $localwpDir" -ForegroundColor Red
    Write-Host "Please make sure the site 'Quadro Portfolio' is created in LocalWP." -ForegroundColor Yellow
    Exit 1
}

Write-Host "[1/3] Ensuring theme directory exists..." -ForegroundColor Green
if (-not (Test-Path $themeTarget)) {
    New-Item -ItemType Directory -Path $themeTarget -Force | Out-Null
}

Write-Host "[2/3] Syncing theme files to LocalWP..." -ForegroundColor Green
$sourceDir = $PSScriptRoot
$exclude = @('.git', '.gemini', 'node_modules', 'deploy-to-xampp.bat', 'deploy-to-xampp.ps1', 'deploy-to-localwp.bat', 'deploy-to-localwp.ps1')

Get-ChildItem -Path $sourceDir -Recurse | Where-Object {
    $item = $_
    $skip = $false
    foreach ($ex in $exclude) {
        if ($item.FullName -like "*\$ex*" -or $item.Name -eq $ex) {
            $skip = $true
            break
        }
    }
    -not $skip
} | ForEach-Object {
    $targetPath = $_.FullName.Replace($sourceDir, $themeTarget)
    if ($_.PSIsContainer) {
        if (-not (Test-Path $targetPath)) { New-Item -ItemType Directory -Path $targetPath -Force | Out-Null }
    } else {
        $parent = Split-Path $targetPath
        if (-not (Test-Path $parent)) { New-Item -ItemType Directory -Path $parent -Force | Out-Null }
        Copy-Item -Path $_.FullName -Destination $targetPath -Force
    }
}

Write-Host "[3/3] Sync complete!" -ForegroundColor Green
Write-Host ""
Write-Host "===============================================================" -ForegroundColor Cyan
Write-Host " THEME INSTALLED TO: $themeTarget" -ForegroundColor White
Write-Host "===============================================================" -ForegroundColor Cyan
Write-Host ""
Write-Host "NEXT STEPS:" -ForegroundColor Yellow
Write-Host "1. Start the site in LocalWP (click 'Start site')."
Write-Host "2. Open http://localhost:10004/wp-admin in your browser."
Write-Host "3. Go to Appearance > Themes > Activate 'Quadro - Group Portfolio Theme'."
