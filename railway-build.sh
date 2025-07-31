#!/bin/bash

echo "🚀 Build de BaabelShop pour Railway..."

# Créer les dossiers de cache
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs
mkdir -p bootstrap/cache

# Permissions
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/

# Créer .env
cat > .env << 'EOF'
APP_NAME=BaabelShop
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=pgsql
DB_HOST=${DB_HOST}
DB_PORT=${DB_PORT}
DB_DATABASE=${DB_DATABASE}
DB_USERNAME=${DB_USERNAME}
DB_PASSWORD=${DB_PASSWORD}

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@baabelshop.com"
MAIL_FROM_NAME="${APP_NAME}"
EOF

# Installation de Composer
echo "📦 Installation des dépendances PHP..."
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# Vérifier si npm est disponible et compiler les assets
if command -v npm &> /dev/null; then
    echo "📦 Installation des dépendances Node.js..."
    npm install
    npm run prod
else
    echo "⚠️ npm non disponible, utilisation des assets pré-compilés..."
    # Copier les assets pré-compilés si ils existent
    if [ -d "public/mix-manifest.json" ]; then
        echo "✅ Assets pré-compilés trouvés"
    else
        echo "⚠️ Aucun asset pré-compilé trouvé"
    fi
fi

# Générer la clé
echo "🔑 Génération de la clé d'application..."
php artisan key:generate

# Migrations
echo "🗄️ Exécution des migrations..."
php artisan migrate --force

# Cache
echo "⚡ Optimisation du cache..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

echo "✅ Build terminé !" 