#!/bin/bash

echo "🚀 Démarrage de BaabelShop..."

# Créer les dossiers nécessaires
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs
mkdir -p bootstrap/cache

# Donner les permissions
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/

# Générer la clé d'application si nécessaire
if [ ! -f .env ]; then
    cp .env.example .env
fi

# Générer la clé si elle n'existe pas
if ! grep -q "APP_KEY=base64:" .env; then
    php artisan key:generate
fi

# Cache des configurations
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Démarrer le serveur
echo "✅ Démarrage du serveur sur le port $PORT"
php artisan serve --host=0.0.0.0 --port=$PORT 