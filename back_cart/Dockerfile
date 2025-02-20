# Utiliser l'image PHP avec Apache
FROM php:8.2-apache

# Installer les extensions PHP nécessaires (ajuste selon tes besoins)
RUN docker-php-ext-install pdo pdo_mysql


# Installer les dépendances nécessaires
RUN apt-get update && apt-get install -y \
    git \
    libssl-dev \
    && rm -rf /var/lib/apt/lists/*

# Activer les modules Apache utiles
RUN a2enmod rewrite

# Définir le dossier de travail
WORKDIR /var/www/html

# Cloner les sources depuis GitHub
RUN git clone https://github.com/ezyinfo/typomap.git .

# Donner les bons droits aux fichiers
RUN chown -R www-data:www-data /var/www/html

# Exposer le port 80
EXPOSE 80