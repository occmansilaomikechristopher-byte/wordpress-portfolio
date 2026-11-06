@echo off
echo ===============================================================
echo  QUADRO PORTFOLIO - DEPLOY THEME TO XAMPP
echo ===============================================================
echo.

set XAMPP_DIR=C:\xampp
set THEME_TARGET=C:\xampp\htdocs\portfolio\wp-content\themes\quadro-portfolio

if not exist "%XAMPP_DIR%" (
    echo [ERROR] XAMPP was not found at %XAMPP_DIR%.
    echo Please make sure XAMPP is installed or edit this script with your path.
    pause
    exit /b 1
)

echo [1/3] Creating WordPress theme directory in XAMPP...
if not exist "%THEME_TARGET%" (
    mkdir "%THEME_TARGET%"
)

echo [2/3] Syncing theme files to XAMPP...
robocopy "%~dp0." "%THEME_TARGET%" /E /XD .git .gemini node_modules /XF deploy-to-xampp.bat deploy-to-xampp.ps1 > nul

echo [3/3] Sync complete!
echo.
echo ===============================================================
echo  THEME INSTALLED TO:
echo  %THEME_TARGET%
echo ===============================================================
echo.
echo NEXT STEPS:
echo 1. Open XAMPP Control Panel and START Apache and MySQL.
echo 2. If WordPress is already installed at http://localhost/portfolio:
echo    Go to Appearance > Themes > Activate "Quadro - Group Portfolio Theme"
echo 3. Click "Portfolio Demo Setup" in the admin sidebar to generate demo data!
echo.
pause

