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
./vendor/bin/sail artisan config:clear
echo 'SEEDING DATABASE'
./vendor/bin/sail artisan key:generate
# manually run this command -> ./vendor/bin/sail artisan migrate:fresh --seed
