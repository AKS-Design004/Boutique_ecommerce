<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BaabelShop - Test</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            min-height: 100vh;
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 15px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5em;
        }
        .status {
            background: rgba(76, 175, 80, 0.2);
            padding: 15px;
            border-radius: 10px;
            margin: 20px 0;
            border-left: 4px solid #4CAF50;
        }
        .info {
            background: rgba(33, 150, 243, 0.2);
            padding: 15px;
            border-radius: 10px;
            margin: 20px 0;
            border-left: 4px solid #2196F3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚀 BaabelShop</h1>
        
        <div class="status">
            <h2>✅ Serveur PHP Fonctionnel</h2>
            <p>Le serveur PHP intégré fonctionne correctement !</p>
        </div>
        
        <div class="info">
            <h3>📋 Informations du serveur :</h3>
            <ul>
                <li><strong>PHP Version :</strong> <?php echo phpversion(); ?></li>
                <li><strong>Date/Heure :</strong> <?php echo date('Y-m-d H:i:s'); ?></li>
                <li><strong>Port :</strong> <?php echo $_SERVER['SERVER_PORT'] ?? 'N/A'; ?></li>
                <li><strong>Document Root :</strong> <?php echo $_SERVER['DOCUMENT_ROOT'] ?? 'N/A'; ?></li>
            </ul>
        </div>
        
        <div class="info">
            <h3>🔧 Prochaines étapes :</h3>
            <p>Le serveur fonctionne ! Maintenant nous devons configurer Laravel pour qu'il fonctionne correctement avec la base de données.</p>
        </div>
    </div>
</body>
</html>
