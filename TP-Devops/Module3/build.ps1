Write-Host "=== Building PHP API Docker Image ===" -ForegroundColor Green

# Build Docker image
docker build -t mobile-php-api:latest .

# Tag for Docker Hub (if needed)
# docker tag mobile-php-api:latest yourusername/mobile-php-api:latest

Write-Host "Build complete!" -ForegroundColor Green
docker images | Select-String "mobile-php-api"
