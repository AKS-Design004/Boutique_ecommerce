# 🗄️ Configuration Base de Données PostgreSQL

## **Étapes pour configurer PostgreSQL sur Railway :**

### **1. Ajouter un service PostgreSQL :**
- Allez sur Railway.com
- Dans votre projet "impartial-amazement"
- Cliquez sur "New Service" → "Database" → "PostgreSQL"
- Nommez-le "BaabelShop-DB"

### **2. Connecter les services :**
- Sélectionnez votre service "Boutique_ecommerce"
- Allez dans l'onglet "Variables"
- Ajoutez les variables d'environnement :
  ```
  DB_HOST=your-postgres-host
  DB_PORT=5432
  DB_DATABASE=your-database-name
  DB_USERNAME=your-username
  DB_PASSWORD=your-password
  ```

### **3. Modifier le script pour utiliser PostgreSQL :**
- Le script `final-start.sh` détectera automatiquement PostgreSQL
- Il exécutera les migrations automatiquement

### **4. Redéployer l'application :**
- Faites un commit et push pour redéployer
- L'application se connectera à PostgreSQL

## **🔧 Commandes pour tester :**

```bash
# Vérifier la connexion
php artisan migrate:status

# Exécuter les migrations
php artisan migrate --force

# Vérifier les tables
php artisan tinker
>>> DB::select('SHOW TABLES');
```

## **📊 Vérification :**
- Allez sur votre URL Railway
- Testez les fonctionnalités (produits, commandes, etc.)
- Vérifiez que les données sont sauvegardées 