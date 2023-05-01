set -e

# API Service
cd api
cp .env.example .env
composer install

# Backoffice Service
cd ../backoffice
cp .env.example .env

# Storefront Service
cd ../storefront
cp .env.example .env

# Run docker-compose
cd ..
docker-compose up -d

# Run migrations
docker exec api-service php artisan migrate

# Run seeds
docker exec api-service php artisan db:seed