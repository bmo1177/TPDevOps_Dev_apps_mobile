#!/bin/bash
echo "=== Building PHP API Docker Image ==="

# Build Docker image
docker build -t mobile-php-api:latest .

# Tag for Docker Hub (if needed)
# docker tag mobile-php-api:latest yourusername/mobile-php-api:latest

echo "Build complete!"
docker images | grep mobile-php-api
