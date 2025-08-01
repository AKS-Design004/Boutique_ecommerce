<?php
// Forcer le mode debug sur Railway
echo "<h1>🐛 Mode Debug Forcé</h1>";

// Forcer les erreurs
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

echo "<h2>🔧 Test de base :</h2>";
echo "<p>✅ PHP fonctionne</p>";
echo "<p>✅ Affichage des erreurs activé</p>";

echo "<h2>📋 Variables d'environnement :</h2>";
echo "<pre style='background: #f0f0f0; padding: 10px; border-radius: 5px;'>";
foreach ($_ENV as $key => $value) {
    if (strpos($key, 'APP_') === 0 || strpos($key, 'DB_') === 0) {
        echo $key . "=" . $value . "\n";
    }
}
echo "</pre>";

echo "<h2>🔍 Test Laravel avec debug :</h2>";
try {
    // Charger Laravel
    require_once __DIR__ . '/../vendor/autoload.php';
    echo "<p style='color: green;'>✅ Autoloader chargé</p>";
    
    $app = require_once __DIR__ . '/../bootstrap/app.php';
    echo "<p style='color: green;'>✅ Application Laravel chargée</p>";
    
    // Forcer le mode debug
    $app->make('config')->set('app.debug', true);
    echo "<p style='color: green;'>✅ Mode debug activé</p>";
    
    // Tester la configuration
    $config = $app->make('config');
    echo "<p>APP_NAME: " . $config->get('app.name') . "</p>";
    echo "<p>APP_ENV: " . $config->get('app.env') . "</p>";
    echo "<p>APP_DEBUG: " . ($config->get('app.debug') ? 'true' : 'false') . "</p>";
    
} catch (Exception $e) {
    echo "<p style='color: red;'>❌ Erreur Laravel: " . $e->getMessage() . "</p>";
    echo "<p>Stack trace:</p>";
    echo "<pre style='background: #f0f0f0; padding: 10px; border-radius: 5px;'>";
    echo $e->getTraceAsString();
    echo "</pre>";
}

echo "<hr>";
echo "<p><a href='/index-simple.php'>← Retour à la page simple</a></p>";
?> 