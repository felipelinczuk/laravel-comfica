composer create-project laravel/laravel apirest --prefer-dist
php artisan make:model Book -m
php artisan migrate
php artisan serve