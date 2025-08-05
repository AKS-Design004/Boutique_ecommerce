FROM php:8.2-apache

# Installer extensions PHP nécessaires pour PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev zip unzip git curl \
    && docker-php-ext-install pdo_pgsql pgsql \
    && a2enmod rewrite

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copier composer.* et installer les dépendances Laravel en production
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader

# Copier le reste du code
COPY . .

# Donner les permissions à Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Changer DocumentRoot vers 'public'
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Fix "Could not reliably determine the server's fully qualified domain name"
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Healthcheck Laravel
HEALTHCHECK --interval=30s --timeout=10s --start-period=30s --retries=5 \
  CMD curl -f http://localhost/health || exit 1

EXPOSE 80

CMD ["apache2-foreground"]
