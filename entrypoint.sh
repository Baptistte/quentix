#!/bin/bash

# Cloner le dépôt GitHub
git clone https://github.com/Baptistte/quentix
cd quentix

# Installer Composer et PHP
apt update && apt install -y composer php8.3-xml php8.3-mysql

# Mettre à jour et installer les dépendances PHP
composer update
composer install -y

# Configurer l'environnement
cp .env.example .env
php artisan key:generate

# Installer Node.js et Vite
apt install -y npm
npm install -g vite -y
npm install tailwindcss postcss autoprefixer --save-dev -y

# Modifier les variables d'environnement
echo "DB_CONNECTION=mysql" >> .env
echo "DB_HOST=192.168.10.100" >> .env
echo "DB_PORT=3306" >> .env
echo "DB_DATABASE=root" >> .env
echo "DB_USERNAME=quentix_DB" >> .env
echo "DB_PASSWORD=" >> .env

# Appliquer les migrations
php artisan migrate

# Modifier le fichier vite.config.js
cat > vite.config.js <<EOF
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',
        port: 5173,
        strictPort: true,
        hmr: {
            host: '192.168.10.22',
        }
    }
});
EOF

npm install -y
npm install vite --save-dev -y

# Lancer le serveur Vite
npm run dev &


