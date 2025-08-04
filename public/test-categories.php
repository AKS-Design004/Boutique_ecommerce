<?php
// Test des catégories
require_once __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

echo "<h1>Test des Catégories</h1>";

try {
    $categories = \App\Models\Category::all();
    
    echo "<h2>Catégories trouvées :</h2>";
    echo "<ul>";
    foreach ($categories as $category) {
        echo "<li>ID: {$category->id} - Nom: {$category->name} - Description: {$category->description}</li>";
    }
    echo "</ul>";
    
    echo "<h2>Test des liens :</h2>";
    echo "<ul>";
    echo "<li><a href='/boutique?categorie=1'>Vêtements (ID: 1)</a></li>";
    echo "<li><a href='/boutique?categorie=2'>Chaussures (ID: 2)</a></li>";
    echo "<li><a href='/boutique?categorie=3'>Accessoires (ID: 3)</a></li>";
    echo "<li><a href='/boutique?categorie=4'>Électroniques (ID: 4)</a></li>";
    echo "</ul>";
    
} catch (Exception $e) {
    echo "<p style='color: red;'>Erreur: " . $e->getMessage() . "</p>";
}
?> 