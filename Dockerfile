# Utilisation de PHP 8.3 comme base
FROM php:8.3-fpm

# Installer les dépendances système et PHP
RUN apt-get update && apt-get install -y \
    php8.3-mysql\
    zip \
    git \
    npm \
    && apt-get clean

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier les fichiers du projet (sauf node_modules et vendor si déjà exclus dans .dockerignore)
COPY . /var/www/html

# Installer Composer & NPM Vite (au build)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader
RUN npm install
RUN npm install tailwindcss postcss autoprefixer --save-dev

# Copier l'entrypoint et donner les droits d'exécution
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh
CMD cat > vite.config.js <<EOF
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
        host: '0.0.0.0', // Écoute toutes les IPs
        port: 5173, // Par défaut, changez si nécessaire
        strictPort: true,
        hmr: {
            host: '192.168.10.22', // Remplacez par votre IP locale
        }
    }
  });
 EOF
# Définir l'entrypoint
ENTRYPOINT ["/entrypoint.sh"]
CMD ["php-fpm"]
