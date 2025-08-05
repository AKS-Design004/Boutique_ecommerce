# Dockerfile pour Laravel avec PHP 8.2 + Apache + Composer

FROM php:8.2-apache

# Installer les dépendances système nécessaires et extensions PHP
RUN apt-get update && apt-get install -y \
    libpq-dev libzip-dev zip unzip git curl \
    && docker-php-ext-install pdo_pgsql pgsql zip \
    && a2enmod rewrite

# Installer Composer globalement
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copier uniquement les fichiers composer pour optimiser le cache Docker
COPY composer.json composer.lock ./

# Installer les dépendances PHP sans les packages de développement
RUN composer install --no-dev --optimize-autoloader

# Copier tout le reste du projet
COPY . .

# Créer les dossiers nécessaires pour Laravel
RUN mkdir -p storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache

# Créer le fichier .env depuis .env.example
RUN cp .env.example .env

# Générer la clé d'application
RUN php artisan key:generate --force

# Optimiser Laravel
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Donner les bonnes permissions aux dossiers nécessaires pour Laravel
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Configurer Apache pour servir le dossier public
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Exposer le port 80 (Apache)
EXPOSE 80

# Démarrer Apache en mode foreground
CMD ["apache2-foreground"]
