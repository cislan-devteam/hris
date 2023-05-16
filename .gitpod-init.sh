npm install 
composer install
cp .env.example .env 
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
sail build —no-cache
sail up -d
sed -i "s|APP_URL=|APP_URL=${GITPOD_WORKSPACE_URL}|g" .env
sed -i "s|APP_URL=https://|APP_URL=https://8000-|g" .env
sed -i "s|DB_HOST=127.0.0.1|DB_HOST=mysql|g" .env
sed -i "s|REDIS_HOST=127.0.0.1|REDIS_HOST=redis|g" .env
sail artisan migrate:fresh --seed
sail artisan key:generate