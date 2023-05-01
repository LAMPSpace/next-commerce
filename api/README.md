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
docker exec -it api composer install
```

4. Generate application key
```sh
docker exec -it api php artisan key:generate
```

5. Run database migrations
```sh
docker exec -it api php artisan migrate
```

6. Run database seeders
```sh
docker exec -it api php artisan db:seed
```

7. Run tests
```sh
docker exec -it api php artisan test
```