<?php
// Diagnostic local - Identification des erreurs
echo "<h1>🔍 Diagnostic Local</h1>";

// Vérifier les erreurs PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>📋 Informations système :</h2>";
echo "<ul>";
echo "<li>PHP Version: " . phpversion() . "</li>";
echo "<li>Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "</li>";
echo "<li>Script Path: " . __FILE__ . "</li>";
echo "</ul>";

echo "<h2>🔧 Test des fichiers principaux :</h2>";

// Test 1: Vérifier index.php
echo "<h3>Test 1: index.php</h3>";
if (file_exists(__DIR__ . '/index.php')) {
    $content = file_get_contents(__DIR__ . '/index.php');
    if (strpos($content, '<?php') !== false) {
        echo "<p style='color: green;'>✅ index.php existe et contient <?php</p>";
    } else {
        echo "<p style='color: red;'>❌ index.php ne contient pas <?php</p>";
    }
} else {
    echo "<p style='color: red;'>❌ index.php n'existe pas</p>";
}

// Test 2: Vérifier .env
echo "<h3>Test 2: .env</h3>";
if (file_exists(__DIR__ . '/../.env')) {
    echo "<p style='color: green;'>✅ .env existe</p>";
} else {
    echo "<p style='color: orange;'>⚠️ .env n'existe pas</p>";
}

// Test 3: Vérifier vendor
echo "<h3>Test 3: vendor/autoload.php</h3>";
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    echo "<p style='color: green;'>✅ vendor/autoload.php existe</p>";
} else {
    echo "<p style='color: red;'>❌ vendor/autoload.php n'existe pas</p>";
}

// Test 4: Vérifier bootstrap
echo "<h3>Test 4: bootstrap/app.php</h3>";
if (file_exists(__DIR__ . '/../bootstrap/app.php')) {
    echo "<p style='color: green;'>✅ bootstrap/app.php existe</p>";
} else {
    echo "<p style='color: red;'>❌ bootstrap/app.php n'existe pas</p>";
}

echo "<h2>🔍 Test de syntaxe PHP :</h2>";
try {
    // Test de syntaxe de ce fichier
    $tokens = token_get_all(file_get_contents(__FILE__));
    echo "<p style='color: green;'>✅ Ce fichier a une syntaxe PHP valide</p>";
} catch (ParseError $e) {
    echo "<p style='color: red;'>❌ Erreur de syntaxe: " . $e->getMessage() . "</p>";
}

echo "<hr>";
echo "<p><a href='/index-simple.php'>← Retour à la page simple</a></p>";
?> 