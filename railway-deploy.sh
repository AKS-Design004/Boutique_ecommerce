#!/bin/bash

# Script de déploiement Railway pour BaabelShop

echo "🚀 Déploiement BaabelShop sur Railway..."

# Installation des dépendances
composer install --no-dev --optimize-autoloader

# Génération de la clé d'application
php artisan key:generate

# Configuration de la base de données PostgreSQL
echo "📊 Configuration PostgreSQL..."

# Exécution des migrations
php artisan migrate --force

# Cache des configurations
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Optimisation des performances
php artisan optimize

echo "✅ Déploiement terminé !" 