# Utiliser l'image PHP avec Apache
FROM php:8.2-apache

# Installer les extensions PHP nécessaires (ajuste selon tes besoins)
RUN docker-php-ext-install pdo pdo_mysql


# Installer les dépendances nécessaires
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    libssl-dev \
    && docker-php-ext-configure gd \
    && docker-php-ext-install gd pdo pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

# Installation de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Activer les modules Apache utiles
RUN a2enmod rewrite

# Définir le dossier de travail
WORKDIR /var/www/html

# Cloner les sources depuis GitHub
# RUN git clone https://github.com/ezyinfo/typomap.git .

# Installation des dépendances Laravel
# RUN composer install --no-dev --optimize-autoloader
# RUN mv backapp/api ./

# Donner les bons droits aux fichiers
RUN chown -R www-data:www-data /var/www/html

# Exposer le port 80
EXPOSE 80

CMD ["apache2-foreground"]