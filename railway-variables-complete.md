# 🔧 Configuration Complète Railway

## **Variables à ajouter dans Railway :**

### **Dans votre service "Boutique_ecommerce" → Variables :**

```
APP_NAME=BaabelShop
APP_ENV=production
APP_KEY=base64:VOTRE_CLE_GENEREE
APP_DEBUG=false
APP_URL=https://boutiqueecommerce-production.up.railway.app

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=pgsql
DB_HOST=postgres.railway.internal
DB_PORT=5432
DB_DATABASE=railway
DB_USERNAME=postgres
DB_PASSWORD=wLuwqzrjjnBpHnJ1bBnscRRfqurYqxZI

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

VIEW_COMPILED_PATH=/tmp
CACHE_PATH=/tmp
```

## **🎯 Étapes :**

1. **Allez sur Railway.com**
2. **Cliquez sur "Boutique_ecommerce"**
3. **Onglet "Variables"**
4. **Ajoutez toutes ces variables**
5. **Redéployez automatiquement**

## **✅ Résultat attendu :**

- Page principale Laravel fonctionnelle
- Connexion PostgreSQL active
- Application e-commerce complète 