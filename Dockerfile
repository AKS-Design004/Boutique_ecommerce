FROM php:8.2-apache

# Installer extensions PHP nécessaires pour PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev zip unzip git curl \
    && docker-php-ext-install pdo_pgsql pgsql \
    && a2enmod rewrite

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le dossier de travail
WORKDIR /var/www/html

# Copier composer.* et installer les dépendances Laravel en prod
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader

# Copier tout le reste du code
COPY . .

# Donner les bonnes permissions à Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Changer DocumentRoot Apache vers le dossier "public"
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# HEALTHCHECK : Vérifie si Laravel répond sur /
HEALTHCHECK --interval=30s --timeout=10s --retries=5 CMD curl -f http://localhost/ || exit 1

# Exposer le port HTTP
EXPOSE 80

# Lancer Apache
CMD ["apache2-foreground"]
