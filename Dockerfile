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

# Installer les extensions PHP nécessaires
RUN docker-php-ext-install gd pdo pdo_mysql

# Installer les dépendances NPM
RUN npm install

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Définir le répertoire de travail
WORKDIR /var/www/html

COPY .env.example .env
RUN echo "DB_CONNECTION=mysql" >> .env && \
    echo "DB_HOST=192.168.10.100" >> .env && \
    echo "DB_PORT=3306" >> .env && \
    echo "DB_DATABASE=Quentix_DB" >> .env && \
    echo "DB_USERNAME=laravel_user" >> .env && \
    echo "DB_PASSWORD=L@r@velPass123" >> .env

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
    echo "            host: '0.0.0.0'," >> vite.config.js && \
    echo "        }" >> vite.config.js && \
    echo "    }" >> vite.config.js && \
    echo "});" >> vite.config.js

# Copier les fichiers du projet (sauf node_modules et vendor si déjà exclus dans .dockerignore)
COPY . /var/www/html
RUN chmod -R 775 /var/www/html && chown -R www-data:www-data /var/www/html
# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader
# Définir l’entrypoint pour s’assurer que Laravel démarre proprement
ENTRYPOINT ["sh", "-c", "php artisan key:generate && php-fpm"]
