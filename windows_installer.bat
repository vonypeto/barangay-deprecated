@echo off


title Laravel-Setup


echo ----------------------------------
echo Progress: 1%% "|"
echo ----------------------------------
ping -n 1 localhost >nul
reg Query "HKLM\Hardware\Description\System\CentralProcessor\0" | find /i "x86" > NUL && set OS=32BIT || set OS=64BIT
cd curl/


if %OS%==32BIT curl.exe  "https://xamppguide.com/dls/xampp-32-bit.exe" --output xampp.exe
if %OS%==64BIT curl.exe  "https://downloadsapachefriends.global.ssl.fastly.net/8.0.3/xampp-windows-x64-8.0.3-0-VS16-installer.exe?from_af=true" --output start xampp.exe
echo xampp

echo ----------------------------------
echo Progress: 25%% "|||"
echo ----------------------------------
ping -n 1 localhost >nul


xampp.exe
echo ----------------------------------
echo Progress: 50%% "|||||||"
echo ----------------------------------
ping -n 1 localhost >nul
curl.exe  "https://getcomposer.org/Composer-Setup.exe" --output start composer.exe
echo composer
echo ----------------------------------
echo Progress: 75%% "||||||||||||"
echo ----------------------------------
echo git
reg Query "HKLM\Hardware\Description\System\CentralProcessor\0" | find /i "x86" > NUL && set OS=32BIT || set OS=64BIT
if %OS%==64BIT curl.exe -L  "https://github.com/git-for-windows/git/releases/download/v2.31.1.windows.1/Git-2.31.1-64-bit.exe" --output git.exe
if %OS%==32BIT curl.exe -L "https://github.com/git-for-windows/git/releases/download/v2.31.1.windows.1/Git-2.31.1-32-bit.exe" --output git.exe
start git.exe
start C:\xampp\xampp_start.exe &

start C:\xampp\mysql\bin\mysql.exe -u root  -e "create database barangay" &
cd ..
timeout 3
taskkill  /t /F /im  xampp_start.exe
start "" "%ProgramFiles%\Git\git-bash.exe" -c "composer update && composer install && Serve.sh && /usr/bin/bash --login -i && exit"


GOTO END

:END
cls
echo.
echo.
echo Setup complete...
echo ----------------------------------
echo Progress: 100%% "|||||||||||||||||"
echo.
echo.
PAUSE