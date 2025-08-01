<?php
// Diagnostic Railway - Identification des problèmes
echo "<h1>🔍 Diagnostic Railway</h1>";

// Vérifier les erreurs PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>📋 Variables d'environnement Railway :</h2>";
echo "<ul>";
echo "<li>APP_NAME: " . (isset($_ENV['APP_NAME']) ? $_ENV['APP_NAME'] : 'Non défini') . "</li>";
echo "<li>APP_ENV: " . (isset($_ENV['APP_ENV']) ? $_ENV['APP_ENV'] : 'Non défini') . "</li>";
echo "<li>APP_KEY: " . (isset($_ENV['APP_KEY']) ? 'Défini' : 'Non défini') . "</li>";
echo "<li>APP_DEBUG: " . (isset($_ENV['APP_DEBUG']) ? $_ENV['APP_DEBUG'] : 'Non défini') . "</li>";
echo "<li>APP_URL: " . (isset($_ENV['APP_URL']) ? $_ENV['APP_URL'] : 'Non défini') . "</li>";
echo "<li>DB_HOST: " . (isset($_ENV['DB_HOST']) ? $_ENV['DB_HOST'] : 'Non défini') . "</li>";
echo "<li>DB_DATABASE: " . (isset($_ENV['DB_DATABASE']) ? $_ENV['DB_DATABASE'] : 'Non défini') . "</li>";
echo "</ul>";

echo "<h2>🔧 Test Laravel :</h2>";
try {
    // Charger Laravel
    require_once __DIR__ . '/../vendor/autoload.php';
    $app = require_once __DIR__ . '/../bootstrap/app.php';
    
    echo "<p style='color: green;'>✅ Laravel se charge correctement</p>";
    
    // Tester la configuration
    $config = $app->make('config');
    echo "<p style='color: green;'>✅ Configuration Laravel OK</p>";
    
    // Tester la base de données
    try {
        $db = $app->make('db');
        $db->connection()->getPdo();
        echo "<p style='color: green;'>✅ Connexion base de données OK</p>";
    } catch (Exception $e) {
        echo "<p style='color: red;'>❌ Erreur base de données: " . $e->getMessage() . "</p>";
    }
    
} catch (Exception $e) {
    echo "<p style='color: red;'>❌ Erreur Laravel: " . $e->getMessage() . "</p>";
}

echo "<h2>📁 Test des fichiers :</h2>";
echo "<ul>";
echo "<li>vendor/autoload.php: " . (file_exists(__DIR__ . '/../vendor/autoload.php') ? '✅ Existe' : '❌ Manquant') . "</li>";
echo "<li>bootstrap/app.php: " . (file_exists(__DIR__ . '/../bootstrap/app.php') ? '✅ Existe' : '❌ Manquant') . "</li>";
echo "<li>storage/logs: " . (is_writable(__DIR__ . '/../storage/logs') ? '✅ Écriture OK' : '❌ Pas d\'écriture') . "</li>";
echo "</ul>";

echo "<h2>🔍 Logs d'erreur :</h2>";
$logFile = __DIR__ . '/../storage/logs/laravel.log';
if (file_exists($logFile)) {
    $logs = file_get_contents($logFile);
    $recentLogs = substr($logs, -1000); // Derniers 1000 caractères
    echo "<pre style='background: #f0f0f0; padding: 10px; border-radius: 5px;'>";
    echo htmlspecialchars($recentLogs);
    echo "</pre>";
} else {
    echo "<p>❌ Fichier de log non trouvé</p>";
}

echo "<hr>";
echo "<p><a href='/index-simple.php'>← Retour à la page simple</a></p>";
?> 