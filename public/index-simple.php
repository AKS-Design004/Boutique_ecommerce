<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BaabelShop - E-commerce</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            min-height: 100vh;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            padding: 40px 0;
        }
        .logo {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        .subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 30px;
        }
        .status {
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            backdrop-filter: blur(10px);
        }
        .status h2 {
            margin-top: 0;
            color: #4ade80;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin: 40px 0;
        }
        .card {
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
            padding: 20px;
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card h3 {
            margin-top: 0;
            color: #60a5fa;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background: #4ade80;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 5px;
            transition: background 0.3s ease;
        }
        .btn:hover {
            background: #22c55e;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">🛍️ BaabelShop</div>
            <div class="subtitle">Votre boutique en ligne moderne</div>
        </div>

        <div class="status">
            <h2>✅ Application Déployée avec Succès !</h2>
            <p>Votre e-commerce BaabelShop est maintenant en ligne sur Railway.</p>
        </div>

        <div class="grid">
            <div class="card">
                <h3>🔗 Tests Disponibles</h3>
                <p>Vérifiez le bon fonctionnement de votre application :</p>
                <a href="/test.php" class="btn">Test Simple</a>
                <a href="/db-test.php" class="btn">Test Base de Données</a>
            </div>

            <div class="card">
                <h3>🗄️ Base de Données</h3>
                <p>PostgreSQL configuré et opérationnel.</p>
                <p>✅ Connexion établie</p>
                <p>✅ Tables créées</p>
            </div>

            <div class="card">
                <h3>🚀 Prochaines Étapes</h3>
                <p>Votre application est prête pour :</p>
                <ul>
                    <li>Ajouter des produits</li>
                    <li>Configurer les paiements</li>
                    <li>Personnaliser le design</li>
                </ul>
            </div>
        </div>

        <div class="footer">
            <p>BaabelShop - Déployé sur Railway | <?php echo date('d/m/Y H:i'); ?></p>
        </div>
    </div>
</body>
</html> 