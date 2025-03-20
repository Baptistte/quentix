# Utilisation de l'image PHP 8.3 comme base
FROM php:8.3-fpm

# Mise à jour des paquets et installation des dépendances nécessaires
RUN apt-get update && apt-get upgrade -y

RUN apt-get install -y \
    git \
    npm 
    # Configuration de PHP GD extension
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd pdo pdo_mysql xml

# Installer vite globalement
RUN npm install -g vite

RUN apt-get clean

# Installation de Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copier le contenu de l'application dans le conteneur
COPY . /var/www/html

# Définir le répertoire de travail
WORKDIR /var/www/html

# Exposer le port pour PHP et Vite
EXPOSE 8000 5173

# Commande pour démarrer PHP et Vite
CMD ["php-fpm"]
