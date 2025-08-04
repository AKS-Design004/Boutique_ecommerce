<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BaabelShop</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('js/image-optimizer.js') }}" defer></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
        }

        .gradient-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }

        .gradient-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="30" r="1.5" fill="rgba(255,255,255,0.08)"/><circle cx="40" cy="70" r="1" fill="rgba(255,255,255,0.06)"/><circle cx="90" cy="80" r="2.5" fill="rgba(255,255,255,0.05)"/><circle cx="10" cy="90" r="1.2" fill="rgba(255,255,255,0.07)"/></svg>');
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        .glassmorphism {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .feature-icon {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        .floating-elements::before,
        .floating-elements::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float-around 15s infinite ease-in-out;
        }

        .floating-elements::before {
            width: 300px;
            height: 300px;
            top: -150px;
            right: -150px;
            animation-delay: -5s;
        }

        .floating-elements::after {
            width: 200px;
            height: 200px;
            bottom: -100px;
            left: -100px;
            animation-delay: -10s;
        }

        @keyframes float-around {
            0%, 100% { transform: translateY(0px) translateX(0px) rotate(0deg); }
            25% { transform: translateY(-30px) translateX(20px) rotate(90deg); }
            50% { transform: translateY(-60px) translateX(-10px) rotate(180deg); }
            75% { transform: translateY(-20px) translateX(-30px) rotate(270deg); }
        }

        .shimmer {
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            background-size: 200% 100%;
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        .text-shadow {
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .header-blur {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.95);
        }

        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
            40% { transform: translateX(-50%) translateY(-10px); }
            60% { transform: translateX(-50%) translateY(-5px); }
        }

        .category-card {
            position: relative;
            overflow: hidden;
        }

        .category-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .category-card:hover::before {
            opacity: 1;
        }

        .product-price {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
        }

        .stats-counter {
            font-family: 'Inter', monospace;
            font-weight: 700;
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100 font-sans antialiased">
<!-- Header amélioré -->
<header class="header-blur shadow-lg sticky top-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full blur opacity-75"></div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="relative h-10 w-10 text-white bg-gradient-to-r from-blue-600 to-purple-600 rounded-full p-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M3 7V6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v1M3 7l1.553 9.32A2 2 0 0 0 6.53 18h10.94a2 2 0 0 0 1.978-1.68L21 7M3 7h18"/>
                    </svg>
                </div>
                <div>
                    <span class="text-3xl font-black bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">BaabelShop</span>
                    <div class="text-xs text-gray-500 font-medium">Votre boutique moderne</div>
                </div>
            </div>

            <nav class="hidden md:flex space-x-12">
                @auth
                    @if(Auth::user()->isAdmin())
                        <!-- Liens uniquement pour les admins -->
                        <a href="{{ route('admin.dashboard') }}" class="relative text-gray-700 hover:text-blue-600 font-semibold text-lg transition-all duration-300 group">
                            Dashboard Admin
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover:w-full"></span>
                        </a>
                        <a href="{{ route('admin.categories.index') }}" class="relative text-gray-700 hover:text-blue-600 font-semibold text-lg transition-all duration-300 group">
                            Catégories
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover:w-full"></span>
                        </a>
                        <a href="{{ route('admin.products.index') }}" class="relative text-gray-700 hover:text-blue-600 font-semibold text-lg transition-all duration-300 group">
                            Gestion Produits
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover:w-full"></span>
                        </a>
                        <a href="{{ route('admin.orders.index') }}" class="relative text-gray-700 hover:text-blue-600 font-semibold text-lg transition-all duration-300 group">
                            Commandes
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover:w-full"></span>
                        </a>
                        <a href="{{ route('admin.users.index') }}" class="relative text-gray-700 hover:text-blue-600 font-semibold text-lg transition-all duration-300 group">
                            Utilisateurs
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover:w-full"></span>
                        </a>
                    @else
                        <!-- Liens pour les clients -->
                        <a href="/" class="relative text-blue-600 font-semibold text-lg transition-all duration-300 group">
                            Accueil
                            <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-gradient-to-r from-blue-600 to-purple-600"></span>
                        </a>
                        <a href="{{ route('shop.index') }}" class="relative text-gray-700 hover:text-blue-600 font-semibold text-lg transition-all duration-300 group">
                            Produits
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover:w-full"></span>
                        </a>
                        <a href="#about" class="relative text-gray-700 hover:text-blue-600 font-semibold text-lg transition-all duration-300 group">
                            À propos
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover:w-full"></span>
                        </a>
                        <a href="{{ route('client.dashboard') }}" class="relative text-gray-700 hover:text-blue-600 font-semibold text-lg transition-all duration-300 group">
                            Mon Espace
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover:w-full"></span>
                        </a>
                        <a href="{{ route('order.history') }}" class="relative text-gray-700 hover:text-blue-600 font-semibold text-lg transition-all duration-300 group">
                            Mes Commandes
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover:w-full"></span>
                        </a>
                    @endif
                @else
                    <!-- Liens pour les visiteurs non connectés -->
                    <a href="/" class="relative text-blue-600 font-semibold text-lg transition-all duration-300 group">
                        Accueil
                        <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-gradient-to-r from-blue-600 to-purple-600"></span>
                    </a>
                    <a href="{{ route('shop.index') }}" class="relative text-gray-700 hover:text-blue-600 font-semibold text-lg transition-all duration-300 group">
                        Produits
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                    <a href="#about" class="relative text-gray-700 hover:text-blue-600 font-semibold text-lg transition-all duration-300 group">
                        À propos
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                @endauth
            </nav>

            <div class="flex items-center space-x-6">
                <a href="{{ route('cart.index') }}" class="relative group">
                    <div class="flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-blue-50 to-purple-50 hover:from-blue-100 hover:to-purple-100 transition-all duration-300 transform hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                        </svg>
                        <span class="ml-2 font-semibold text-gray-800">Panier</span>
                        <span class="ml-1 px-2 py-1 bg-gradient-to-r from-blue-600 to-purple-600 text-white text-xs rounded-full font-bold">{{ count(session('cart', [])) }}</span>
                    </div>
                </a>

                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 transition duration-150 ease-in-out">
                                <div class="flex items-center space-x-2">
                                    <div class="w-8 h-8 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </div>
                                    <span class="font-semibold">{{ Auth::user()->name }}</span>
                                </div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            @if(Auth::user() && Auth::user()->isClient())
                                <x-dropdown-link :href="route('client.dashboard')">{{ __('Mon Espace') }}</x-dropdown-link>
                                <x-dropdown-link :href="route('client.profile')">{{ __('Mon Profil') }}</x-dropdown-link>
                                <x-dropdown-link :href="route('order.history')">{{ __('Mes Commandes') }}</x-dropdown-link>
                                <div class="border-t border-gray-100"></div>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}">
                        <button class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-3 rounded-full font-semibold text-lg shadow-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105">
                            Connexion
                        </button>
                    </a>
                @endauth
            </div>
        </div>
    </div>
</header>

<!-- Hero Section modernisé -->
<section class="gradient-hero text-white relative min-h-screen flex items-center">
    <div class="floating-elements"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 relative z-10">
        <div class="text-center">

            <h1 class="text-7xl md:text-8xl font-black mb-8 text-shadow leading-tight">
                Bienvenue sur
                <span class="block bg-gradient-to-r from-white via-blue-100 to-white bg-clip-text text-transparent">
                        BaabelShop
                    </span>
            </h1>

            <p class="text-2xl mb-12 text-blue-100 font-light max-w-3xl mx-auto leading-relaxed">
                Découvrez notre collection exclusive de produits de qualité premium avec une expérience d'achat révolutionnaire
            </p>

            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-16">
                <a href="{{ route('shop.index') }}">
                    <button class="btn-primary text-white px-10 py-5 rounded-full font-bold text-xl flex items-center shadow-2xl relative overflow-hidden group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-6 w-6 group-hover:rotate-12 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M6 2l.01 2M18 2l-.01 2M3 6h18M4 6v14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6"/>
                        </svg>
                        Découvrir la collection
                    </button>
                </a>
            </div>

            <!-- Stats section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                <div class="glassmorphism rounded-2xl p-6 text-center">
                    <div class="stats-counter text-4xl font-black mb-2">1000+</div>
                    <div class="text-blue-100 font-medium">Produits disponibles</div>
                </div>
                <div class="glassmorphism rounded-2xl p-6 text-center">
                    <div class="stats-counter text-4xl font-black mb-2">5000+</div>
                    <div class="text-blue-100 font-medium">Clients satisfaits</div>
                </div>
                <div class="glassmorphism rounded-2xl p-6 text-center">
                    <div class="stats-counter text-4xl font-black mb-2">24/7</div>
                    <div class="text-blue-100 font-medium">Support client</div>
                </div>
            </div>
        </div>
    </div>

    <div class="scroll-indicator">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
        </svg>
    </div>
</section>

<!-- Featured Products modernisé -->
<section class="py-24 bg-gradient-to-br from-gray-50 via-white to-blue-50 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent font-bold text-lg mb-4 block">COLLECTION VEDETTE</span>
            <h2 class="text-5xl font-black text-gray-900 mb-6">Nos Coups de Cœur</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">Découvrez une sélection exclusive de produits choisis avec soin par notre équipe</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
            @foreach($featuredProducts as $product)
                <div class="card-hover bg-white rounded-3xl shadow-xl overflow-hidden group">
                    <div class="relative overflow-hidden">
                        @if($product->primaryImage)
                            <img src="{{ asset($product->primaryImage->path) }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-80 object-cover group-hover:scale-110 transition-transform duration-500"
                                 loading="lazy"
                                 decoding="async"
                                 fetchpriority="low">
                        @else
                            <div class="w-full h-80 bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        @endif
                        <div class="absolute top-4 right-4">
                            <span class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-3 py-1 rounded-full text-sm font-bold">NOUVEAU</span>
                        </div>
                    </div>

                    <div class="p-8">
                        <h3 class="text-2xl font-bold mb-4 text-gray-900 group-hover:text-blue-600 transition-colors duration-300">{{ $product->name }}</h3>
                        <p class="product-price text-4xl font-black mb-6">{{ number_format($product->price, 0, '', ' ') }} FCFA</p>

                        <a href="{{ route('shop.show', $product) }}" class="block">
                            <button class="w-full bg-gradient-to-r from-gray-900 to-gray-800 hover:from-blue-600 hover:to-purple-600 text-white py-4 rounded-2xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                                Voir le produit
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </button>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-16">
            <a href="{{ route('shop.index') }}" class="inline-flex items-center bg-gradient-to-r from-blue-600 to-purple-600 text-white px-10 py-4 rounded-full font-bold text-xl shadow-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105">
                Voir tous les produits
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Features Section modernisé -->
<section class="bg-gradient-to-r from-blue-900 via-purple-900 to-blue-900 py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-20">
            <h2 class="text-5xl font-black text-white mb-6">Pourquoi Choisir BaabelShop ?</h2>
            <p class="text-xl text-blue-100 max-w-3xl mx-auto">Une expérience d'achat exceptionnelle avec des avantages exclusifs</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <div class="feature-card text-center group">
                <div class="feature-icon w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-8 shadow-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-white">Livraison Express</h3>
                <p class="text-blue-100 text-lg leading-relaxed">Livraison gratuite sous 24h pour toute commande supérieure à 50 000 FCFA</p>
            </div>

            <div class="feature-card text-center group">
                <div class="feature-icon w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-8 shadow-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-white">Garantie Qualité</h3>
                <p class="text-blue-100 text-lg leading-relaxed">Retour gratuit sous 30 jours, satisfait ou remboursé</p>
            </div>

            <div class="feature-card text-center group">
                <div class="feature-icon w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-8 shadow-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4 text-white">Paiement Sécurisé</h3>
                <p class="text-blue-100 text-lg leading-relaxed">Vos données de paiement sont cryptées et totalement protégées</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section modernisé -->
<section id="about" class="bg-gradient-to-br from-white via-blue-50 to-purple-50 py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20">
            <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent font-bold text-lg mb-4 block">À PROPOS DE NOUS</span>
            <h2 class="text-5xl font-black text-gray-900 mb-8">L'Excellence à Votre Service</h2>
            <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                BaabelShop révolutionne l'expérience e-commerce en alliant technologie de pointe et service client exceptionnel. Nous sélectionnons avec passion des produits d'exception pour créer votre univers shopping idéal.
            </p>
        </div>

        <div class="mb-20">
            <h3 class="text-4xl font-bold mb-16 text-gray-900 text-center">Nos Univers Premium</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="category-card bg-white rounded-3xl shadow-xl overflow-hidden group transform hover:scale-105 transition-all duration-500">
                    <div class="relative">
                        <img src="/images/univers/vetements.jpg" alt="Vêtements" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <span class="text-white font-bold text-xl">Mode & Style</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h4 class="text-xl font-bold text-gray-900 mb-3">Vêtements</h4>
                        <p class="text-gray-600 mb-6 leading-relaxed">Collection tendance pour exprimer votre personnalité unique</p>
                        <a href="/boutique?categorie=1" class="block">
                            <button class="w-full bg-gradient-to-r from-gray-900 to-gray-800 hover:from-blue-600 hover:to-purple-600 text-white py-4 rounded-2xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                                Explorer la mode
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </button>
                        </a>
                    </div>
                </div>

                <div class="category-card bg-white rounded-3xl shadow-xl overflow-hidden group transform hover:scale-105 transition-all duration-500">
                    <div class="relative">
                        <img src="/images/univers/chaussures.jpg" alt="Chaussures" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <span class="text-white font-bold text-xl">Confort & Style</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h4 class="text-xl font-bold text-gray-900 mb-3">Chaussures</h4>
                        <p class="text-gray-600 mb-6 leading-relaxed">Du sport à l'élégance, chaque pas compte</p>
                        <a href="/boutique?categorie=2" class="block">
                            <button class="w-full bg-gradient-to-r from-gray-900 to-gray-800 hover:from-blue-600 hover:to-purple-600 text-white py-4 rounded-2xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                                Voir les chaussures
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </button>
                        </a>
                    </div>
                </div>

                <div class="category-card bg-white rounded-3xl shadow-xl overflow-hidden group transform hover:scale-105 transition-all duration-500">
                    <div class="relative">
                        <img src="/images/univers/accessoires.jpg" alt="Accessoires" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <span class="text-white font-bold text-xl">Accessoires & Plus</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h4 class="text-xl font-bold text-gray-900 mb-3">Accessoires</h4>
                        <p class="text-gray-600 mb-6 leading-relaxed">Les détails qui font toute la différence</p>
                        <a href="/boutique?categorie=3" class="block">
                            <button class="w-full bg-gradient-to-r from-gray-900 to-gray-800 hover:from-blue-600 hover:to-purple-600 text-white py-4 rounded-2xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                                Voir les accessoires
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </button>
                        </a>
                    </div>
                </div>

                <div class="category-card bg-white rounded-3xl shadow-xl overflow-hidden group transform hover:scale-105 transition-all duration-500">
                    <div class="relative">
                        <img src="/images/univers/electroniques.jpg" alt="Électronique" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <span class="text-white font-bold text-xl">Tech & Innovation</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h4 class="text-xl font-bold text-gray-900 mb-3">Électronique</h4>
                        <p class="text-gray-600 mb-6 leading-relaxed">La technologie au service de votre quotidien</p>
                        <a href="/boutique?categorie=4" class="block">
                            <button class="w-full bg-gradient-to-r from-gray-900 to-gray-800 hover:from-blue-600 hover:to-purple-600 text-white py-4 rounded-2xl font-bold text-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                                Explorer la tech
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline ml-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Newsletter Section -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-3xl p-12 text-center text-white relative overflow-hidden">
            <div class="absolute inset-0 bg-black opacity-10"></div>
            <div class="relative z-10">
                <h3 class="text-4xl font-bold mb-6">Restez Connecté</h3>
                <p class="text-xl mb-8 text-blue-100">Recevez nos dernières nouveautés et offres exclusives</p>
                <div class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                    <input type="email" placeholder="Votre email" class="flex-1 px-6 py-4 rounded-full text-gray-900 font-medium focus:outline-none focus:ring-4 focus:ring-white/50">
                    <button class="bg-white text-blue-600 px-8 py-4 rounded-full font-bold hover:bg-blue-50 transition-all duration-300 transform hover:scale-105">
                        S'abonner
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
@include('components.footer')

<script>
    // Effet de défilement pour le header
    window.addEventListener('scroll', function() {
        const header = document.querySelector('header');

        if (window.scrollY > 100) {
            header.classList.add('shadow-2xl');
        } else {
            header.classList.remove('shadow-2xl');
        }
    });

    // Animation des compteurs de stats
    function animateCounters() {
        const counters = document.querySelectorAll('.stats-counter');
        counters.forEach(counter => {
            const target = parseInt(counter.textContent.replace(/\D/g, ''));
            const suffix = counter.textContent.replace(/\d/g, '');
            let current = 0;
            const increment = target / 100;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                counter.textContent = Math.floor(current) + suffix;
            }, 30);
        });
    }

    // Observer pour détecter quand les stats entrent dans la vue
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounters();
                observer.unobserve(entry.target);
            }
        });
    });

    const statsSection = document.querySelector('.stats-counter').closest('.grid');
    if (statsSection) {
        observer.observe(statsSection);
    }

    // Effet parallax léger pour le hero
    window.addEventListener('scroll', function() {
        const hero = document.querySelector('.gradient-hero');
        const scrolled = window.pageYOffset;
        const rate = scrolled * -0.5;

        if (hero) {
            hero.style.transform = `translateY(${rate}px)`;
        }
    });
</script>
</body>
</html>
