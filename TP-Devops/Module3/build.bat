@echo off
echo === Building PHP API Docker Image ===

REM Build Docker image
docker build -t mobile-php-api:latest .

REM Show result
echo Build complete!
docker images | findstr "mobile-php-api"
pause
