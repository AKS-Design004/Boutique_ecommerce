#!/bin/bash

echo "🔍 Diagnostic de BaabelShop..."

# Vérifier les fichiers essentiels
echo "📁 Vérification des fichiers..."
ls -la .env
ls -la storage/framework/cache/
ls -la storage/logs/

# Vérifier les permissions
echo "🔐 Vérification des permissions..."
ls -la storage/
ls -la bootstrap/cache/

# Vérifier la configuration
echo "⚙️ Vérification de la configuration..."
php artisan config:show

# Vérifier les routes
echo "🛣️ Vérification des routes..."
php artisan route:list

# Vérifier la base de données
echo "🗄️ Vérification de la base de données..."
php artisan migrate:status

# Vérifier les logs d'erreur
echo "📋 Logs d'erreur..."
tail -n 50 storage/logs/laravel.log

echo "✅ Diagnostic terminé !" 