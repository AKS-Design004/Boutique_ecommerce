FROM php:8.2-cli

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Définir le répertoire de travail
WORKDIR /app

# Copier les fichiers essentiels pour le build (composer files et .env.example)
COPY composer.json composer.lock .env.example ./

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader

# Copier le reste du code
COPY . .

# Créer les dossiers nécessaires
RUN mkdir -p storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache

# Définir les permissions
RUN chmod -R 775 storage \
    && chmod -R 775 bootstrap/cache

# Créer le fichier .env depuis .env.example (maintenant garanti d'être présent)
RUN cp .env.example .env

# Générer la clé d'application
RUN php artisan key:generate --force

# Optimiser Laravel
RUN php artisan config:clear \
    && php artisan cache:clear \
    && php artisan route:clear \
    && php artisan view:clear \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Exposer le port
EXPOSE 8000

# Commande de démarrage
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"] 