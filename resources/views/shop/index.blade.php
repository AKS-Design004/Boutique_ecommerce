@extends('layouts.app')

@section('content')
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

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .product-price {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 700;
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

        .search-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .filter-button {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .filter-button.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .filter-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
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
            width: 200px;
            height: 200px;
            top: -100px;
            right: -100px;
            animation-delay: -5s;
        }

        .floating-elements::after {
            width: 150px;
            height: 150px;
            bottom: -75px;
            left: -75px;
            animation-delay: -10s;
        }

        @keyframes float-around {
            0%, 100% { transform: translateY(0px) translateX(0px) rotate(0deg); }
            25% { transform: translateY(-30px) translateX(20px) rotate(90deg); }
            50% { transform: translateY(-60px) translateX(-10px) rotate(180deg); }
            75% { transform: translateY(-20px) translateX(-30px) rotate(270deg); }
        }
    </style>

    <!-- Hero Section pour la page boutique -->
    <section class="gradient-hero text-white relative py-24">
        <div class="floating-elements"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <h1 class="text-5xl md:text-6xl font-black mb-6 leading-tight">
                    Notre
                    <span class="block bg-gradient-to-r from-white via-blue-100 to-white bg-clip-text text-transparent">
                    Collection
                </span>
                </h1>
                <p class="text-xl mb-8 text-blue-100 font-light max-w-2xl mx-auto leading-relaxed">
                    Découvrez nos produits soigneusement sélectionnés pour votre satisfaction
                </p>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Favoris en haut avec style modernisé -->
        @if(Auth::check() && isset($favorites) && count($favorites))
            <div class="mb-16">
                <div class="text-center mb-12">
                    <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent font-bold text-lg mb-4 block">MES FAVORIS</span>
                    <h2 class="text-4xl font-black text-gray-900 mb-4">Mes Coups de Cœur</h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    @foreach($products->whereIn('id', $favorites) as $product)
                        <div class="card-hover bg-white rounded-3xl shadow-xl overflow-hidden group">
                            <div class="relative overflow-hidden">
                                @if($product->primaryImage)
                                    <img src="{{ asset($product->primaryImage->path) }}" 
                                         alt="{{ $product->name }}" 
                                         class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"
                                         loading="lazy"
                                         decoding="async"
                                         fetchpriority="low"
                                         width="300"
                                         height="256">
                                @else
                                    <div class="w-full h-64 bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute top-4 right-4">
                                    <span class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-3 py-1 rounded-full text-sm font-bold">♥ FAVORI</span>
                                </div>
                            </div>
                            <div class="p-6 flex-1 flex flex-col justify-between">
                                <div class="mb-3">
                                    <span class="text-sm text-gray-500 font-medium bg-gray-100 px-3 py-1 rounded-full">{{ $product->category->name ?? '-' }}</span>
                                </div>
                                <h3 class="text-xl font-bold mb-3 text-gray-900 group-hover:text-blue-600 transition-colors duration-300">{{ $product->name }}</h3>
                                <p class="product-price text-3xl font-black mb-6">{{ number_format($product->price, 0, '', ' ') }} FCFA</p>

                                <div class="space-y-3">
                                    <form action="{{ route('shop.unfavorite', $product) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full bg-gradient-to-r from-red-500 to-pink-500 text-white py-3 rounded-2xl font-semibold hover:from-red-600 hover:to-pink-600 transition-all duration-300 transform hover:scale-105 flex items-center justify-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.572l-7.5 7.5-7.5-7.5A5.25 5.25 0 0 1 12 6.75a5.25 5.25 0 0 1 7.5 6.822z"/>
                                            </svg>
                                            Retirer des favoris
                                        </button>
                                    </form>
                                    <a href="{{ route('shop.show', $product) }}" class="block">
                                        <button class="w-full bg-gradient-to-r from-gray-900 to-gray-800 hover:from-blue-600 hover:to-purple-600 text-white py-3 rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105">
                                            Voir détails
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Section de recherche et filtres modernisée -->
        <div class="mb-12">
            <div class="text-center mb-8">
                <h2 class="text-4xl font-black text-gray-900 mb-4">Tous nos Produits</h2>
            </div>

            <!-- Barre de recherche modernisée -->
            <div class="search-container rounded-3xl p-6 mb-8 shadow-xl">
                <div class="relative max-w-2xl mx-auto">
                    <svg class="absolute left-6 top-1/2 transform -translate-y-1/2 text-blue-600 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <form method="GET" action="{{ route('shop.index') }}">
                        <input type="text" name="q" value="{{ request('q') }}" placeholder="Rechercher votre produit idéal..." class="pl-16 pr-6 py-4 border-2 border-blue-200 rounded-2xl w-full focus:ring-4 focus:ring-blue-200 focus:border-blue-500 text-lg font-medium bg-white transition-all duration-300" />
                    </form>
                </div>
            </div>

            <!-- Catégories modernisées -->
            <div class="flex flex-wrap justify-center gap-4 mb-8">
                <a href="{{ route('shop.index') }}" class="filter-button @if(!request('categorie')) active @else bg-white text-blue-600 border-2 border-blue-200 hover:border-blue-500 @endif px-8 py-4 rounded-2xl font-bold text-lg shadow-lg">
                    Tous les produits
                </a>
                @foreach($categories as $cat)
                    <a href="{{ route('shop.index', array_merge(request()->except('page'), ['categorie' => $cat->id])) }}" class="filter-button @if(request('categorie') == $cat->id) active @else bg-white text-blue-600 border-2 border-blue-200 hover:border-blue-500 @endif px-8 py-4 rounded-2xl font-bold text-lg shadow-lg">
                        {{ $cat->name }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Grille de produits modernisée -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @forelse($products as $product)
                <div class="card-hover bg-white rounded-3xl shadow-xl overflow-hidden group">
                    <div class="relative overflow-hidden">
                        @if($product->primaryImage)
                            <img src="{{ asset($product->primaryImage->path) }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500"
                                 loading="lazy"
                                 decoding="async"
                                 fetchpriority="low"
                                 width="300"
                                 height="256">
                        @else
                            <div class="w-full h-64 bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        @endif
                        <div class="absolute top-4 right-4">
                            <span class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-3 py-1 rounded-full text-sm font-bold">NOUVEAU</span>
                        </div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div class="mb-3">
                            <span class="text-sm text-gray-500 font-medium bg-gray-100 px-3 py-1 rounded-full">{{ $product->category->name ?? '-' }}</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900 group-hover:text-blue-600 transition-colors duration-300">{{ $product->name }}</h3>
                        <p class="product-price text-3xl font-black mb-6">{{ number_format($product->price, 0, '', ' ') }} FCFA</p>

                        <div class="space-y-3">
                            <a href="{{ route('shop.show', $product) }}" class="block">
                                <button class="w-full bg-gradient-to-r from-gray-200 to-gray-300 hover:from-blue-100 hover:to-purple-100 text-gray-800 hover:text-blue-600 py-3 rounded-2xl font-semibold transition-all duration-300 transform hover:scale-105 border-2 border-transparent hover:border-blue-200">
                                    Voir détails
                                </button>
                            </a>
                            <form action="{{ route('cart.add', $product) }}" method="POST" class="w-full">
                                @csrf
                                <button type="submit" class="btn-primary w-full text-white py-3 rounded-2xl font-bold text-lg flex items-center justify-center gap-2 shadow-lg relative overflow-hidden" @if(isset($product->stock) && $product->stock < 1) disabled @endif>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <circle cx="9" cy="21" r="1"/>
                                        <circle cx="20" cy="21" r="1"/>
                                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                                    </svg>
                                    Ajouter au panier
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20">
                    <div class="max-w-md mx-auto">
                        <div class="w-24 h-24 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-8">
                            <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Aucun produit trouvé</h3>
                        <p class="text-gray-600 text-lg mb-6">Essayez de modifier vos critères de recherche ou explorez nos catégories.</p>
                        <a href="{{ route('shop.index') }}">
                            <button class="btn-primary text-white px-8 py-4 rounded-2xl font-bold text-lg shadow-lg relative overflow-hidden">
                                Voir tous les produits
                            </button>
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination modernisée -->
        <div class="text-center mt-16">
            <div class="inline-block bg-white rounded-3xl shadow-xl p-4">
                {{ $products->withQueryString()->links() }}
            </div>
        </div>
    </div>

    <script>
        // Animation au scroll pour les cartes
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        });

        document.querySelectorAll('.card-hover').forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transitionDelay = `${index * 0.1}s`;
            observer.observe(card);
        });

        // Effet sur les boutons de filtre
        document.querySelectorAll('.filter-button').forEach(button => {
            button.addEventListener('mouseenter', function() {
                if (!this.classList.contains('active')) {
                    this.style.transform = 'translateY(-3px) scale(1.05)';
                }
            });

            button.addEventListener('mouseleave', function() {
                if (!this.classList.contains('active')) {
                    this.style.transform = 'translateY(0) scale(1)';
                }
            });
        });
    </script>
@endsection
