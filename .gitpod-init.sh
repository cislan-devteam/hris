npm install 
composer install
cp .env.example .env 
echo 'BUILDING CONTAINERS USING LARAVEL SAIL'
./vendor/bin/sail build —no-cache
./vendor/bin/sail up -d
sed -i "s|APP_URL=http://localhost|APP_URL=${GITPOD_WORKSPACE_URL}|g" .env
sed -i "s|APP_URL=https://|APP_URL=https://80-|g" .env
sed -i "s|DB_HOST=127.0.0.1|DB_HOST=mysql|g" .env
sed -i "s|REDIS_HOST=127.0.0.1|REDIS_HOST=redis|g" .env
sed -i "s|'host' => env('DB_HOST', '127.0.0.1')|'host' => env('DB_HOST', 'mysql')|g" config/database.php
sed -i "s|'database' => env('DB_DATABASE', 'forge')|'database' => env('DB_DATABASE', 'laravel')|g" config/database.php
sed -i "s|'username' => env('DB_USERNAME', 'forge')|'username' => env('DB_USERNAME', 'root')|g" config/database.php
sed -i "s|'host' => env('REDIS_HOST', '127.0.0.1')|'host' => env('REDIS_HOST', 'redis')|g" config/database.php
./vendor/bin/sail artisan cache:clear
./vendor/bin/sail artisan route:clear
./vendor/bin/sail artisan config:clear
./vendor/bin/sail artisan view:clear
echo 'SEEDING DATABASE'
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate:fresh --seed

