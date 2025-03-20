#!/bin/sh

php artisan migrate --force

# Démarrer Laravel et Vite en arrière-plan
php artisan serve --host=0.0.0.0 --port=8000 &  
npm run dev &  

# Lancer php-fpm en avant-plan pour maintenir le conteneur actif
exec php-fpm
