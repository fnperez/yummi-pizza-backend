### Steps to get it working in local
1. Install docker
2. In root folder:
    1. `docker-compose up -d --build`
    2. `docker-compose exec app bash`
    3. `composer install`
    4. Set up .env file
    4. `php artisan key:generate`
    4. `php artisan migrate:fresh --seed --force`
    5. `php artisan jwt:secret` and copy the result in JWT_SECRET in .env file