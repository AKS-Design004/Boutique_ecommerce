# 🗄️ Guide Configuration PostgreSQL Railway

## **Étape 1 : Ajouter PostgreSQL**

1. **Allez sur Railway.com**
2. **Sélectionnez votre projet** "impartial-amazement"
3. **Cliquez "New Service"**
4. **Choisissez "Database"**
5. **Sélectionnez "PostgreSQL"**
6. **Nommez-le** "BaabelShop-DB"

## **Étape 2 : Récupérer les variables**

Une fois PostgreSQL créé :
1. **Cliquez sur le service PostgreSQL**
2. **Onglet "Variables"**
3. **Notez ces valeurs :**
   - `PGHOST` (ex: `containers-us-west-123.railway.app`)
   - `PGUSER` (ex: `postgres`)
   - `PGPASSWORD` (ex: `password123`)
   - `PGDATABASE` (ex: `railway`)
   - `PGPORT` (ex: `5432`)

## **Étape 3 : Configurer l'application**

1. **Sélectionnez votre service "Boutique_ecommerce"**
2. **Onglet "Variables"**
3. **Ajoutez ces variables :**
   ```
   DB_HOST=PGHOST_VALUE
   DB_PORT=PGPORT_VALUE
   DB_DATABASE=PGDATABASE_VALUE
   DB_USERNAME=PGUSER_VALUE
   DB_PASSWORD=PGPASSWORD_VALUE
   ```

## **Étape 4 : Redéployer**

```bash
git add .
git commit -m "feat: Configuration PostgreSQL"
git push origin master
```

## **Étape 5 : Vérifier**

1. **Attendez le redéploiement**
2. **Allez sur votre URL Railway**
3. **Testez les fonctionnalités**

## **🔧 Commandes de test :**

```bash
# Vérifier la connexion
php artisan migrate:status

# Exécuter les migrations
php artisan migrate --force

# Vérifier les tables
php artisan tinker
>>> DB::select('SELECT table_name FROM information_schema.tables WHERE table_schema = \'public\'');
```

## **✅ Résultat attendu :**

- Application connectée à PostgreSQL
- Tables créées automatiquement
- Données persistantes
- Fonctionnalités complètes 