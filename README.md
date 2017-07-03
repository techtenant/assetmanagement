Asset Management System
Built using laravel 5.4
Requirements:
Localhost
Composer.
Installation:
clone the project
composer update
generate key:php artisan key:generate
Create database, edit .env file
Run migrations: php artisan migrate
Run seeder:php artisan db:seed --class="SentinelDatabaseSeeder"
Then serve: php artisan serve
