# **API | Laravel 10**

## Getting Started
1. Build API image
```sh
docker build -t api .
```

2. Run the API container
```sh
docker run -d -p 8000:80 api
```

3. Install dependencies
```sh
docker exec -it api-service composer install
```

4. Generate application key
```sh
docker exec -it api-service php artisan key:generate
```

5. Run database migrations
```sh
docker exec -it api-service php artisan migrate
```

6. Run database seeders
```sh
docker exec -it api-service php artisan db:seed
```

7. Run tests
```sh
docker exec -it api-service php artisan test
```

8. Create repository
```sh
php artisan make:repository repository_name
```

9. Create repository interface
```sh
php artisan make:interface repository_interface_name

Ex: php artisan make:interface CategoryRepositoryInterface
```

10. Create service
```sh
php artisan make:service service_name
```

11. Create service interface
```sh
php artisan make:interface service_interface_name

Ex: php artisan make:interface CategoryServiceInterface
```

12. Create trait
```sh
php artisan make:trait trait_name

Ex: php artisan make:trait UUID
```