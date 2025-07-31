#!/bin/bash

# Script de préparation pour Railway
echo "🚀 Préparation de BaabelShop pour Railway..."

# Créer les dossiers de cache nécessaires
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs

# Donner les permissions appropriées
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/

# Copier le fichier .env si nécessaire
if [ ! -f .env ]; then
    cp .env.example .env
fi

echo "✅ Préparation terminée !" 