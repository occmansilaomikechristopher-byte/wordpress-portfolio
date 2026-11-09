@echo off
echo ===============================================================
echo  QUADRO PORTFOLIO - DEPLOY THEME TO LOCALWP
echo ===============================================================
echo.

set LOCALWP_DIR=%USERPROFILE%\Local Sites\quadro-portfolio
set THEME_TARGET=%LOCALWP_DIR%\app\public\wp-content\themes\quadro-portfolio

if not exist "%LOCALWP_DIR%" (
    echo [ERROR] LocalWP site folder was not found at:
    echo %LOCALWP_DIR%
    echo Please make sure the site 'Quadro Portfolio' is created in LocalWP.
    pause
    exit /b 1
)

echo [1/3] Creating theme directory in LocalWP...
if not exist "%THEME_TARGET%" (
    mkdir "%THEME_TARGET%"
)

echo [2/3] Syncing theme files to LocalWP...
robocopy "%~dp0." "%THEME_TARGET%" /E /XD .git .gemini node_modules /XF deploy-to-xampp.bat deploy-to-xampp.ps1 deploy-to-localwp.bat deploy-to-localwp.ps1 > nul

echo [3/3] Sync complete!
echo.
echo ===============================================================
echo  THEME INSTALLED TO:
echo  %THEME_TARGET%
echo ===============================================================
echo.
echo NEXT STEPS:
echo 1. Start the site in LocalWP (click 'Start site').
echo 2. Open http://localhost:10004/wp-admin
echo 3. Go to Appearance > Themes > Activate 'Quadro - Group Portfolio Theme'
echo.
pause
