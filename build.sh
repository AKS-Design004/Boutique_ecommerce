#!/bin/bash

echo "🔨 Build de BaabelShop..."

# Créer les dossiers de cache
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs
mkdir -p bootstrap/cache

# Permissions
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/

# Installation de Composer
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# Copier .env
cp .env.example .env

# Générer la clé
php artisan key:generate

# Migrations
php artisan migrate --force

# Cache
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

echo "✅ Build terminé !" 