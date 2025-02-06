# Utiliser l'image PHP avec Apache
FROM php:8.2-apache

# Installer les extensions PHP nécessaires (ajuste selon tes besoins)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Activer les modules Apache utiles
RUN a2enmod rewrite

# Définir le dossier de travail
WORKDIR /var/www/html

# Copier le contenu de l'application dans le conteneur
COPY . /var/www/html

# Donner les bons droits aux fichiers
RUN chown -R www-data:www-data /var/www/html

# Exposer le port 80
EXPOSE 80
