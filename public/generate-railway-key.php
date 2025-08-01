<?php
// Générer la clé Laravel pour Railway
echo "<h1>🔑 Génération Clé Laravel pour Railway</h1>";

// Générer une clé Laravel
$key = base64_encode(random_bytes(32));
echo "<h2>Votre clé Laravel :</h2>";
echo "<p style='background: #f0f0f0; padding: 10px; border-radius: 5px; font-family: monospace;'>";
echo "APP_KEY=" . $key;
echo "</p>";

echo "<h2>📋 Variables complètes pour Railway :</h2>";
echo "<div style='background: #f0f0f0; padding: 15px; border-radius: 5px; font-family: monospace; white-space: pre-wrap;'>";
echo "APP_NAME=BaabelShop
APP_ENV=production
APP_KEY=" . $key . "
APP_DEBUG=false
APP_URL=https://boutiqueecommerce-production.up.railway.app

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=pgsql
DB_HOST=postgres.railway.internal
DB_PORT=5432
DB_DATABASE=railway
DB_USERNAME=postgres
DB_PASSWORD=wLuwqzrjjnBpHnJ1bBnscRRfqurYqxZI

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

VIEW_COMPILED_PATH=/tmp
CACHE_PATH=/tmp";
echo "</div>";

echo "<hr>";
echo "<p><strong>Instructions :</strong></p>";
echo "<ol>";
echo "<li>Copiez toutes ces variables</li>";
echo "<li>Allez sur Railway → Boutique_ecommerce → Variables</li>";
echo "<li>Ajoutez chaque variable une par une</li>";
echo "<li>Attendez le redéploiement automatique</li>";
echo "<li>Testez : https://boutiqueecommerce-production.up.railway.app</li>";
echo "</ol>";

echo "<p><a href='/index-simple.php'>← Retour à la page simple</a></p>";
?> 