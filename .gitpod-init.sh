npm install 
composer install
cp .env.example .env 
echo 'BUILDING CONTAINERS USING LARAVEL SAIL'
sleep(5)
./vendor/bin/sail build —no-cache
./vendor/bin/sail up -d
sed -i "s|APP_URL=|APP_URL=${GITPOD_WORKSPACE_URL}|g" .env
sed -i "s|APP_URL=https://|APP_URL=https://8000-|g" .env
sed -i "s|DB_HOST=127.0.0.1|DB_HOST=mysql|g" .env
sed -i "s|REDIS_HOST=127.0.0.1|REDIS_HOST=redis|g" .env
echo 'SEEDING DATABASE'
sleep(5)
./vendor/bin/sail artisan migrate:fresh --seed
./vendor/bin/sail artisan key:generate