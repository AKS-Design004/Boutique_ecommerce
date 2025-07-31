#!/bin/bash

echo "🚀 Démarrage final de BaabelShop..."

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
APP_DEBUG=true
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

# Vérifier la connexion à la base de données
echo "🗄️ Vérification de la base de données..."
if [ -n "$DB_HOST" ] && [ -n "$DB_DATABASE" ]; then
    echo "✅ Variables PostgreSQL détectées"
    echo "Host: $DB_HOST"
    echo "Database: $DB_DATABASE"
    
    # Attendre que PostgreSQL soit prêt
    echo "⏳ Attente de PostgreSQL..."
    sleep 10
    
    # Tester la connexion
    if php artisan migrate:status > /dev/null 2>&1; then
        echo "✅ Connexion PostgreSQL réussie"
        php artisan migrate --force
        echo "✅ Migrations exécutées"
    else
        echo "❌ Échec de connexion PostgreSQL, utilisation de SQLite"
        # Fallback SQLite
        cat > .env << 'EOF'
APP_NAME=BaabelShop
APP_ENV=production
APP_KEY=base64:$(openssl rand -base64 32)
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120
EOF
        mkdir -p database
        touch database/database.sqlite
        php artisan migrate --force
    fi
else
    echo "⚠️ Variables PostgreSQL non définies, utilisation de SQLite"
    # Configuration SQLite
    cat > .env << 'EOF'
APP_NAME=BaabelShop
APP_ENV=production
APP_KEY=base64:$(openssl rand -base64 32)
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120
EOF
    mkdir -p database
    touch database/database.sqlite
    php artisan migrate --force
fi

# Démarrer le serveur PHP intégré
echo "✅ Démarrage du serveur sur le port $PORT"
php -S 0.0.0.0:$PORT -t public/ 