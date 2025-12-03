FROM php:8.2-apache

# Installer les dépendances nécessaires pour PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Copier ton projet dans le dossier web du conteneur
COPY . /var/www/html/

WORKDIR /var/www/html
EXPOSE 80
