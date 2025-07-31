#!/bin/bash

echo "🚀 Installation de BaabelShop..."

# Créer les dossiers de cache AVANT Composer
echo "📁 Création des dossiers de cache..."
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs
mkdir -p bootstrap/cache

# Donner les permissions
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/

# Copier .env si nécessaire
if [ ! -f .env ]; then
    cp .env.example .env
fi

# Installation de Composer SANS les scripts problématiques
echo "📦 Installation des dépendances..."
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# Générer la clé d'application
echo "🔑 Génération de la clé d'application..."
php artisan key:generate

# Migrations
echo "🗄️ Exécution des migrations..."
php artisan migrate --force

# Cache des configurations
echo "⚡ Optimisation du cache..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

echo "✅ Installation terminée !" 