# Utilisation de PHP 8.3 comme base
FROM php:8.3-fpm

# Installer les dépendances système et PHP
RUN apt-get update && apt-get install -y \
    zip \
    git \
    npm \
    zlib1g-dev \
    libpng-dev \
    && apt-get clean

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier les fichiers du projet (sauf node_modules et vendor si déjà exclus dans .dockerignore)
COPY . /var/www/html
RUN cp /var/www/html/.env.example /var/www/html/.env

# Installer les extensions PHP nécessaires
RUN docker-php-ext-install gd pdo pdo_mysql

# Définir les permissions
RUN chmod -R 775 /var/www/html && chown -R www-data:www-data /var/www/html

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# Installer les dépendances NPM
RUN npm install && npm install tailwindcss postcss autoprefixer --save-dev && npm run build

# Copier l'entrypoint Laravel + Vite
RUN echo "import { defineConfig } from 'vite';" > vite.config.js && \
    echo "import laravel from 'laravel-vite-plugin';" >> vite.config.js && \
    echo "" >> vite.config.js && \
    echo "export default defineConfig({" >> vite.config.js && \
    echo "    plugins: [" >> vite.config.js && \
    echo "        laravel({" >> vite.config.js && \
    echo "            input: ['resources/css/app.css', 'resources/js/app.js']," >> vite.config.js && \
    echo "            refresh: true," >> vite.config.js && \
    echo "        })," >> vite.config.js && \
    echo "    ]," >> vite.config.js && \
    echo "    server: {" >> vite.config.js && \
    echo "        host: '0.0.0.0'," >> vite.config.js && \
    echo "        port: 5173," >> vite.config.js && \
    echo "        strictPort: true," >> vite.config.js && \
    echo "        hmr: {" >> vite.config.js && \
    echo "            host: '192.168.10.22'," >> vite.config.js && \
    echo "        }" >> vite.config.js && \
    echo "    }" >> vite.config.js && \
    echo "});" >> vite.config.js

# Définir l’entrypoint pour s’assurer que Laravel démarre proprement
ENTRYPOINT ["sh", "-c", "php artisan key:generate && php-fpm"]
