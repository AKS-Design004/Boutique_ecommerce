#!/bin/bash

echo "🚀 Démarrage simple de BaabelShop..."

# Créer les dossiers essentiels
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs
mkdir -p bootstrap/cache

# Permissions
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/

# Créer .env minimal
if [ ! -f .env ]; then
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
EOF
fi

# Générer la clé
php artisan key:generate

# Démarrer
echo "✅ Démarrage du serveur sur le port $PORT"
php artisan serve --host=0.0.0.0 --port=$PORT 