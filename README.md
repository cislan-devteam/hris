# HRIS 

### Requirements:
    PHP Version: ^8.1 
    Composer: ^2.0.0
    MySQL: ^5.7
    Docker Desktop
    For Windows users: 
        Ubuntu Terminal 
        WSL

### Setup steps:

1. Clone repository `https://github.com/cislan-devteam/hris`
2. Do the following commands
   1. `npm install`
   2. `composer install`
   3. `cp .env.example .env`
3. Configure database credentials in .env file
4. Use `php artisan migrate:fresh --seed` for database
5. Use `php artisan key:generate` to generate application key

### Laravel Sail for Docker

Documentation: https://laravel.com/docs/10.x/sail
