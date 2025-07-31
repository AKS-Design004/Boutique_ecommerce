<?php
// Test de connexion PostgreSQL
echo "<h1>🗄️ Test Connexion Base de Données</h1>";

// Vérifier les variables d'environnement
echo "<h2>📋 Variables d'environnement :</h2>";
echo "<ul>";
echo "<li>DB_HOST: " . (isset($_ENV['DB_HOST']) ? $_ENV['DB_HOST'] : 'Non défini') . "</li>";
echo "<li>DB_PORT: " . (isset($_ENV['DB_PORT']) ? $_ENV['DB_PORT'] : 'Non défini') . "</li>";
echo "<li>DB_DATABASE: " . (isset($_ENV['DB_DATABASE']) ? $_ENV['DB_DATABASE'] : 'Non défini') . "</li>";
echo "<li>DB_USERNAME: " . (isset($_ENV['DB_USERNAME']) ? $_ENV['DB_USERNAME'] : 'Non défini') . "</li>";
echo "<li>DB_PASSWORD: " . (isset($_ENV['DB_PASSWORD']) ? '***' : 'Non défini') . "</li>";
echo "</ul>";

// Tester la connexion Laravel
echo "<h2>🔗 Test Connexion Laravel :</h2>";
try {
    // Charger Laravel
    require_once __DIR__ . '/../vendor/autoload.php';
    $app = require_once __DIR__ . '/../bootstrap/app.php';
    $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
    
    // Tester la connexion
    $connection = DB::connection();
    $pdo = $connection->getPdo();
    
    echo "<p style='color: green;'>✅ Connexion réussie !</p>";
    echo "<p>Type de base : " . $connection->getDriverName() . "</p>";
    
    // Lister les tables
    echo "<h3>📊 Tables disponibles :</h3>";
    $tables = DB::select('SHOW TABLES');
    if (empty($tables)) {
        $tables = DB::select("SELECT table_name FROM information_schema.tables WHERE table_schema = 'public'");
    }
    
    if (!empty($tables)) {
        echo "<ul>";
        foreach ($tables as $table) {
            $tableName = is_object($table) ? $table->Tables_in_database ?? $table->table_name : $table;
            echo "<li>$tableName</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Aucune table trouvée</p>";
    }
    
} catch (Exception $e) {
    echo "<p style='color: red;'>❌ Erreur de connexion : " . $e->getMessage() . "</p>";
}

echo "<hr>";
echo "<p><a href='/'>← Retour à l'accueil</a></p>";
?> 