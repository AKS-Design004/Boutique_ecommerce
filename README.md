# 🛍️ E-Commerce Laravel - Plateforme de Vente en Ligne

## 📋 Description du Projet

Une plateforme e-commerce complète développée avec **Laravel 10** et **Tailwind CSS**, offrant une expérience d'achat moderne et intuitive. Le projet inclut un système d'administration robuste et une interface client responsive.

## ✨ Fonctionnalités Principales

### 🛒 Front-Office (Interface Client)
- **Catalogue de produits** avec filtrage par catégorie et recherche
- **Système de panier** avec gestion des quantités
- **Processus de commande** complet avec validation
- **Gestion des favoris** pour les produits
- **Historique des commandes** avec factures PDF
- **Profil utilisateur** avec informations personnelles
- **Système d'authentification** sécurisé

### 🔧 Back-Office (Interface Admin)
- **Dashboard moderne** avec statistiques en temps réel
- **Gestion des produits** avec images multiples
- **Gestion des catégories** avec images
- **Gestion des commandes** avec suivi des statuts
- **Gestion des utilisateurs** (création d'admins/clients)
- **Génération de factures PDF** automatique
- **Notifications email** pour les commandes

## 🚀 Technologies Utilisées

### Backend
- **Laravel 10** - Framework PHP
- **PostgreSQL** - Base de données
- **Eloquent ORM** - Gestion des données
- **Laravel Sanctum** - Authentification API
- **Intervention Image** - Traitement d'images

### Frontend
- **Tailwind CSS** - Framework CSS
- **Alpine.js** - Interactions JavaScript
- **Blade Templates** - Moteur de templates
- **Responsive Design** - Mobile-first

### Outils
- **Laravel Mix** - Compilation des assets
- **Laravel Notifications** - Système d'emails
- **DomPDF** - Génération de factures PDF

## 📁 Structure du Projet

```
ecommerce-laravel/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/           # Contrôleurs admin
│   │   ├── Auth/            # Authentification
│   │   └── ...              # Autres contrôleurs
│   ├── Models/              # Modèles Eloquent
│   ├── Notifications/       # Notifications email
│   └── Providers/           # Providers Laravel
├── database/
│   ├── migrations/          # Migrations DB
│   ├── seeders/            # Données de test
│   └── factories/          # Factories Eloquent
├── resources/
│   ├── views/
│   │   ├── admin/          # Vues admin
│   │   ├── auth/           # Vues authentification
│   │   ├── shop/           # Vues boutique
│   │   └── layouts/        # Layouts partagés
│   ├── css/                # Styles Tailwind
│   └── js/                 # JavaScript
├── routes/
│   ├── web.php             # Routes principales
│   └── auth.php            # Routes d'auth
└── public/
    ├── images/             # Images produits
    └── storage/            # Fichiers uploadés
```

## 🗄️ Modèles de Données

### Utilisateurs
- **User** : Clients et administrateurs
- **Rôles** : `client` et `admin`
- **Authentification** : Email/mot de passe

### Produits
- **Product** : Informations produits
- **Category** : Catégories avec images
- **ProductImage** : Images multiples par produit
- **Favorite** : Favoris des utilisateurs

### Commandes
- **Order** : Commandes clients
- **OrderItem** : Articles dans les commandes
- **Payment** : Informations de paiement

## 🔐 Système d'Autorisation

### Rôles Utilisateurs
- **Client** : Accès aux achats et commandes
- **Administrateur** : Accès complet à l'administration

### Middleware
- `auth` : Authentification requise
- `admin` : Accès admin uniquement
- `guest` : Accès visiteurs uniquement

## 🎨 Interface Utilisateur

### Design System
- **Couleurs** : Palette moderne avec gradients
- **Typographie** : Fonts optimisées (Inter)
- **Composants** : Boutons, cartes, formulaires cohérents
- **Animations** : Transitions fluides et micro-interactions

### Responsive Design
- **Mobile-first** : Optimisé pour tous les écrans
- **Breakpoints** : sm, md, lg, xl, 2xl
- **Navigation** : Menu adaptatif

## 📊 Dashboard Administrateur

### Statistiques en Temps Réel
- **Chiffre d'affaires** total
- **Nombre de commandes** et clients
- **Produits en stock** et rupture
- **Commandes récentes** avec statuts

### Gestion Avancée
- **CRUD complet** pour tous les modules
- **Upload d'images** avec redimensionnement
- **Validation** des données côté serveur
- **Notifications** email automatiques

## 🛒 Fonctionnalités E-Commerce

### Catalogue Produits
- **Filtrage** par catégorie et prix
- **Recherche** par nom et description
- **Pagination** optimisée
- **Images** multiples par produit

### Panier et Commandes
- **Ajout/Suppression** d'articles
- **Modification** des quantités
- **Calcul automatique** des totaux
- **Validation** des stocks

### Paiement et Livraison
- **Simulation** de paiement (démo)
- **Statuts** de commande multiples
- **Factures PDF** automatiques
- **Notifications** email

## 🚀 Installation et Configuration

### Prérequis
- PHP 8.1+
- Composer
- Node.js & NPM
- PostgreSQL
- Laragon (optionnel)

### Installation

1. **Cloner le projet**
```bash
git clone https://github.com/AKS-Design004/Boutique_ecommerce.git
cd ecommerce-laravel
```

2. **Installer les dépendances**
```bash
composer install
npm install
```

3. **Configuration**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Base de données**
```bash
php artisan migrate
php artisan db:seed
```

5. **Assets**
```bash
npm run dev
# ou pour la production
npm run build
```

6. **Stockage**
```bash
php artisan storage:link
```

### Configuration Base de Données
```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=ecommerce
DB_USERNAME=postgres
DB_PASSWORD=password
```

## 👥 Utilisateurs de Test

### Administrateur
- **Email** : admin@shop.com
- **Mot de passe** : password
- **Rôle** : admin

### Client
- **Email** : client@shop.com
- **Mot de passe** : password
- **Rôle** : client

## 📧 Configuration Email

### Mailtrap (Développement)
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
```

## 🔧 Commandes Artisan Utiles

```bash
# Générer les clés d'application
php artisan key:generate

# Vider le cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Optimiser l'application
php artisan optimize

# Surveiller les logs
php artisan tail

# Tinker pour debug
php artisan tinker
```

## 📱 Routes Principales

### Front-Office
- `/` - Page d'accueil
- `/boutique` - Catalogue produits
- `/panier` - Panier d'achat
- `/commande` - Processus de commande
- `/mes-commandes` - Historique client

### Back-Office
- `/admin/dashboard` - Dashboard admin
- `/admin/products` - Gestion produits
- `/admin/categories` - Gestion catégories
- `/admin/orders` - Gestion commandes
- `/admin/users` - Gestion utilisateurs

### Authentification
- `/login` - Connexion
- `/register` - Inscription
- `/forgot-password` - Mot de passe oublié

## 🎯 Fonctionnalités Avancées

### Gestion des Images
- **Upload multiple** d'images produits
- **Redimensionnement** automatique
- **Optimisation** des tailles
- **Images par défaut** pour les produits

### Performance
- **Lazy loading** des images
- **Cache** des catégories
- **Pagination** optimisée
- **Compression** des assets

### Sécurité
- **CSRF protection** sur tous les formulaires
- **Validation** côté serveur
- **Sanitisation** des données
- **Middleware** d'autorisation

## 📈 Statistiques et Analytics

### Dashboard Admin
- **Ventes** par période
- **Produits** les plus vendus
- **Clients** actifs
- **Commandes** en attente

### Rapports
- **Factures PDF** automatiques
- **Emails** de confirmation
- **Notifications** de statut

## 🔄 Workflow de Développement

### Git Flow
1. **Feature branches** pour nouvelles fonctionnalités
2. **Pull requests** avec code review
3. **Tests** avant merge
4. **Deployment** automatisé

### Tests
- **Tests unitaires** pour les modèles
- **Tests d'intégration** pour les contrôleurs
- **Tests de régression** pour l'UI

## 🚀 Déploiement

### Production
- **Serveur** : VPS avec Ubuntu
- **Web Server** : Nginx
- **PHP** : 8.1+ avec extensions
- **Base de données** : PostgreSQL
- **Cache** : Redis
- **SSL** : Let's Encrypt

### Variables d'Environnement
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://votre-domaine.com

DB_CONNECTION=pgsql
DB_HOST=localhost
DB_DATABASE=ecommerce_prod
DB_USERNAME=ecommerce_user
DB_PASSWORD=secure_password

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
```

## 🤝 Contribution

### Standards de Code
- **PSR-12** pour PHP
- **ESLint** pour JavaScript
- **Prettier** pour le formatage
- **Conventional Commits** pour les messages

### Pull Request Process
1. **Fork** du repository
2. **Feature branch** descriptive
3. **Tests** et documentation
4. **Pull request** avec description

## 👨‍💻 Auteur

**Développé par** : Abdou Karime THIAM
**Date** : 2025
**Version** : 1.0.0

## 🙏 Remerciements

- **Laravel Team** pour le framework
- **Tailwind CSS** pour le design system
- **Alpine.js** pour les interactions
- **Communauté Laravel** pour le support

---

## 📞 Support

Pour toute question ou problème :
- **Issues** : GitHub Issues
- **Email** : thiamabdoukarim89@gmail.com
- **Documentation** : Wiki du projet

---

**🎉 Merci d'utiliser notre plateforme e-commerce !**
