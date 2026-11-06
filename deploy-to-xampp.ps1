# Quadro Portfolio - PowerShell XAMPP Deployment Script
Write-Host "===============================================================" -ForegroundColor Cyan
Write-Host " QUADRO PORTFOLIO - DEPLOY THEME TO XAMPP" -ForegroundColor White
Write-Host "===============================================================" -ForegroundColor Cyan
Write-Host ""

$xamppPath = "C:\xampp"
$targetDir = "C:\xampp\htdocs\portfolio\wp-content\themes\quadro-portfolio"
$sourceDir = $PSScriptRoot

if (-not (Test-Path $xamppPath)) {
    Write-Host "[ERROR] XAMPP was not found at $xamppPath." -ForegroundColor Red
    exit 1
}

Write-Host "[1/2] Preparing target theme directory in XAMPP..." -ForegroundColor Yellow
if (-not (Test-Path $targetDir)) {
    New-Item -ItemType Directory -Force -Path $targetDir | Out-Null
}

Write-Host "[2/2] Copying theme files..." -ForegroundColor Yellow
$excludeDirs = @('.git', '.gemini', 'node_modules')
$excludeFiles = @('deploy-to-xampp.bat', 'deploy-to-xampp.ps1')

Get-ChildItem -Path $sourceDir -Recurse | Where-Object {
    $item = $_
    $skip = $false
    foreach ($d in $excludeDirs) {
        if ($item.FullName -like "*\$d\*") { $skip = $true; break }
    }
    if ($excludeFiles -contains $item.Name) { $skip = $true }
    -not $skip
} | ForEach-Object {
    $targetPath = $_.FullName.Replace($sourceDir, $targetDir)
    if ($_.PSIsContainer) {
        if (-not (Test-Path $targetPath)) { New-Item -ItemType Directory -Force -Path $targetPath | Out-Null }
    } else {
        Copy-Item -Path $_.FullName -Destination $targetPath -Force
    }
}

Write-Host ""
Write-Host "[SUCCESS] Theme successfully copied to:" -ForegroundColor Green
Write-Host "  $targetDir" -ForegroundColor White
Write-Host ""
Write-Host "Quick Setup:" -ForegroundColor Cyan
Write-Host "1. Start Apache & MySQL in XAMPP Control Panel."
Write-Host "2. Visit http://localhost/portfolio/wp-admin/"
Write-Host "3. Under Appearance > Themes, activate 'Quadro - Group Portfolio Theme'."
Write-Host "4. Use 'Portfolio Demo Setup' to seed the 4 members and projects!" -ForegroundColor Yellow

