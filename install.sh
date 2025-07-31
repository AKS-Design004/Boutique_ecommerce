#!/bin/bash

echo "🚀 Installation de BaabelShop..."

# Créer les dossiers nécessaires
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs
mkdir -p bootstrap/cache

# Donner les permissions
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/

# Installer les dépendances sans scripts
composer install --no-dev --optimize-autoloader --no-scripts

# Copier .env si nécessaire
if [ ! -f .env ]; then
    cp .env.example .env
fi

echo "✅ Installation terminée !" 