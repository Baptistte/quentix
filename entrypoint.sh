#!/bin/sh

# Copier .env.example si .env n'existe pas
if [ ! -f /var/www/html/.env ]; then
    cp /var/www/html/.env.example /var/www/html/.env
fi

# Forcer les variables MySQL
sed -i 's|DB_CONNECTION=.*|DB_CONNECTION=mysql|' /var/www/html/.env
sed -i 's|# DB_HOST=.*|DB_HOST=192.168.10.100|' /var/www/html/.env
sed -i 's|# DB_PORT=.*|DB_PORT=3306|' /var/www/html/.env
sed -i 's|# DB_DATABASE=.*|DB_DATABASE=Quentix_DB|' /var/www/html/.env
sed -i 's|# DB_USERNAME=.*|DB_USERNAME=laravel_user|' /var/www/html/.env
sed -i 's|# DB_PASSWORD=.*|DB_PASSWORD=L@r@velPass123|' /var/www/html/.env

php artisan key:generate

php artisan migrate --force

# Démarrer Laravel et Vite en arrière-plan
php artisan serve --host=0.0.0.0 --port=8000 &
npm run dev &

# Lancer php-fpm en avant-plan pour maintenir le conteneur actif
exec php-fpm
