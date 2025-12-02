FROM php:8.2-apache

# Activer les extensions nécessaires pour PostgreSQL
RUN docker-php-ext-install pdo pdo_pgsql

# Copier ton projet dans le dossier web du conteneur
COPY . /var/www/html/

# Définir le dossier de travail
WORKDIR /var/www/html

# Exposer le port HTTP
EXPOSE 80
