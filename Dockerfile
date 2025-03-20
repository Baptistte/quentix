# Utilisation de PHP 8.3 comme base
FROM php:8.3-fpm

# Installer les dépendances système et PHP
RUN apt-get update && apt-get install -y \
    zip \
    git \
    npm \
    zlib1g-dev \
    && apt-get clean
RUN apt-get install -y libpng-dev

# Définir le répertoire de travail
WORKDIR /var/www/html
# Copier les fichiers du projet (sauf node_modules et vendor si déjà exclus dans .dockerignore)
COPY . /var/www/html

# Installer Composer & NPM Vite (au build)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader
RUN npm install
RUN npm install tailwindcss postcss autoprefixer --save-dev
RUN npm install npm run build

RUN cp .env.example .env
RUN echo "DB_CONNECTION=mysql" >> .env && \
    echo "DB_HOST=192.168.10.100" >> .env && \
    echo "DB_PORT=3306" >> .env && \
    echo "DB_DATABASE=Quentix_DB" >> .env && \
    echo "DB_USERNAME=laravel_user" >> .env && \
    echo "DB_PASSWORD=L@r@velPass123" >> .env

RUN docker-php-ext-install gd pdo pdo_mysql
RUN php artisan migrate
RUN php artisan key:generate

# Copier l'entrypoint et donner les droits d'exécution
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



# Définir l'entrypoint
CMD ["php-fpm"]
