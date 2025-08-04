#!/bin/bash

# Script de démarrage pour Railway
set -e

echo "🚀 Démarrage de BaabelShop sur Railway..."

# Créer les dossiers nécessaires
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs
mkdir -p bootstrap/cache

# Définir les permissions
chmod -R 775 storage
chmod -R 775 bootstrap/cache

# Générer la clé d'application si elle n'existe pas
if [ ! -f .env ]; then
    echo "📝 Création du fichier .env..."
    cp .env.example .env
fi

# Générer APP_KEY si elle n'existe pas
if ! grep -q "APP_KEY=base64:" .env; then
    echo "🔑 Génération de la clé d'application..."
    php artisan key:generate --force
fi

# Configurer la base de données
echo "🗄️ Configuration de la base de données..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Vérifier la connexion à la base de données
echo "🔍 Vérification de la connexion à la base de données..."
php artisan migrate --force

echo "✅ Configuration terminée, démarrage du serveur..."

# Démarrer avec php artisan serve (plus simple pour Railway)
exec php artisan serve --host=0.0.0.0 --port=$PORT 