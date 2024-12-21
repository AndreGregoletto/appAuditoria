docker exec -it laravel_app bash

# Dentro do container:
composer install
php artisan key:generate
chmod -R 777 storage bootstrap/cache
exit