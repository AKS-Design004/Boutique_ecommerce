<?php
// Debug Laravel - Identification des erreurs
echo "<h1>🔍 Debug Laravel</h1>";

// Vérifier les erreurs PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>📋 Variables d'environnement :</h2>";
echo "<ul>";
echo "<li>APP_ENV: " . (isset($_ENV['APP_ENV']) ? $_ENV['APP_ENV'] : 'Non défini') . "</li>";
echo "<li>APP_DEBUG: " . (isset($_ENV['APP_DEBUG']) ? $_ENV['APP_DEBUG'] : 'Non défini') . "</li>";
echo "<li>DB_HOST: " . (isset($_ENV['DB_HOST']) ? $_ENV['DB_HOST'] : 'Non défini') . "</li>";
echo "<li>DB_DATABASE: " . (isset($_ENV['DB_DATABASE']) ? $_ENV['DB_DATABASE'] : 'Non défini') . "</li>";
echo "</ul>";

echo "<h2>🔧 Test Laravel :</h2>";
try {
    // Charger Laravel
    require_once __DIR__ . '/../vendor/autoload.php';
    $app = require_once __DIR__ . '/../bootstrap/app.php';
    
    echo "<p style='color: green;'>✅ Laravel chargé avec succès</p>";
    
    // Tester la configuration
    $config = $app['config'];
    echo "<p>Configuration chargée</p>";
    
    // Tester la base de données
    try {
        $connection = DB::connection();
        echo "<p style='color: green;'>✅ Connexion DB réussie</p>";
    } catch (Exception $e) {
        echo "<p style='color: orange;'>⚠️ Erreur DB: " . $e->getMessage() . "</p>";
    }
    
} catch (ParseError $e) {
    echo "<p style='color: red;'>❌ Erreur de syntaxe: " . $e->getMessage() . "</p>";
    echo "<p>Fichier: " . $e->getFile() . "</p>";
    echo "<p>Ligne: " . $e->getLine() . "</p>";
} catch (Exception $e) {
    echo "<p style='color: red;'>❌ Erreur Laravel: " . $e->getMessage() . "</p>";
}

echo "<hr>";
echo "<p><a href='/index-simple.php'>← Retour à la page simple</a></p>";
?> 