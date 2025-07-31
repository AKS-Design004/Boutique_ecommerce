@extends('layouts.app')

@section('content')
    @php
        $images = $product->images;
        $sizes = isset($product->sizes) && is_array($product->sizes) && count($product->sizes) ? $product->sizes : null;
        $colors = isset($product->colors) && is_array($product->colors) && count($product->colors) ? $product->colors : null;
        $stock = $product->stock ?? 10;
        $originalPrice = $product->original_price ?? null;
        $discount = ($originalPrice && $originalPrice > $product->price) ? round(100 - ($product->price / $originalPrice) * 100) : null;
        $infos = [
            'Matière' => $product->material ?? null,
            'Entretien' => $product->care ?? null,
            'Origine' => $product->origin ?? null,
            'Livraison' => $product->delivery ?? null,
        ];
    @endphp

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
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
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

        .selection-button {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .selection-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.2);
        }

        .selection-button.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-color: transparent;
        }

        .quantity-control {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(102, 126, 234, 0.2);
        }

        .image-gallery {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .thumbnail-button {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .thumbnail-button:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.2);
        }

        .thumbnail-button.active {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
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

        .info-card {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(102, 126, 234, 0.1);
        }

        .breadcrumb-item {
            transition: all 0.3s ease;
        }

        .breadcrumb-item:hover {
            color: #667eea;
            transform: translateY(-1px);
        }
    </style>

    <!-- Section avec breadcrumb -->
    <section class="bg-gradient-to-br from-gray-50 via-white to-blue-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb modernisé -->
            <div class="glassmorphism rounded-2xl px-6 py-4 mb-8 inline-flex items-center space-x-3 text-sm font-medium">
                <a href="{{ route('home') }}" class="breadcrumb-item text-blue-600 hover:text-blue-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Accueil
                </a>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <a href="{{ route('shop.index') }}" class="breadcrumb-item text-blue-600 hover:text-blue-800">Produits</a>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-gray-700 truncate max-w-xs">{{ $product->name }}</span>
            </div>

            <div class="text-center">
            <span class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-4 py-2 rounded-full text-sm font-bold mb-4 inline-block">
                {{ $product->category->name ?? 'PRODUIT' }}
            </span>
                <h1 class="text-4xl md:text-5xl font-black mb-4 leading-tight text-gray-900">
                    {{ $product->name }}
                </h1>
            </div>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <!-- Images avec design modernisé -->
            <div class="space-y-6">
                <div class="image-gallery">
                    <div class="mb-6">
                        <img src="{{ isset($images[0]) ? asset($images[0]->path) : '/placeholder.svg' }}" alt="{{ $product->name }}" class="w-full h-[500px] object-cover rounded-3xl shadow-2xl" id="mainImage">
                    </div>
                    @if(count($images) > 1)
                        <div class="flex space-x-4 justify-center">
                            @foreach($images as $idx => $img)
                                <button type="button" onclick="changeMainImage('{{ asset($img->path) }}', this)" class="thumbnail-button w-20 h-20 rounded-2xl overflow-hidden border-3 border-gray-200 hover:border-blue-500 focus:border-blue-500 transition-all duration-300 @if($idx === 0) active @endif">
                                    <img src="{{ asset($img->path) }}" alt="" class="w-full h-full object-cover" />
                                </button>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- Info produit modernisée -->
            <div class="space-y-8">
                <!-- Prix avec design premium -->
                <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-3xl p-8 shadow-xl">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center space-x-4">
                            <span class="product-price text-5xl font-black">{{ number_format($product->price, 0, '', ' ') }} FCFA</span>
                            @if($originalPrice && $originalPrice > $product->price)
                                <div class="text-right">
                                    <span class="text-2xl text-gray-500 line-through block">{{ number_format($originalPrice, 0, '', ' ') }} FCFA</span>
                                    <span class="bg-gradient-to-r from-red-500 to-pink-500 text-white px-3 py-1 rounded-full text-sm font-bold">-{{ $discount }}%</span>
                                </div>
                            @endif
                        </div>
                        <div class="text-right">
                            <div class="flex items-center text-green-600 font-semibold">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ $stock }} en stock
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="info-card rounded-3xl p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Description</h3>
                    <p class="text-gray-700 text-lg leading-relaxed">{!! nl2br(e($product->description)) !!}</p>
                </div>

                <!-- Sélection taille -->
                @if($sizes)
                    <div class="info-card rounded-3xl p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Choisir la taille</h3>
                        <div class="grid grid-cols-4 gap-4">
                            @foreach($sizes as $size)
                                <button type="button" onclick="selectSize(this)" class="selection-button px-6 py-4 border-2 border-gray-200 rounded-2xl font-bold text-lg hover:border-blue-500 focus:border-blue-500 transition-all duration-300">
                                    {{ $size }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Sélection couleur -->
                @if($colors)
                    <div class="info-card rounded-3xl p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Choisir la couleur</h3>
                        <div class="grid grid-cols-3 gap-4">
                            @foreach($colors as $color)
                                <button type="button" onclick="selectColor(this)" class="selection-button px-6 py-4 border-2 border-gray-200 rounded-2xl font-bold text-lg hover:border-blue-500 focus:border-blue-500 transition-all duration-300">
                                    {{ $color }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Quantité modernisée -->
                <div class="info-card rounded-3xl p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Quantité</h3>
                    <div class="flex items-center justify-between">
                        <div class="quantity-control flex items-center rounded-2xl overflow-hidden">
                            <button type="button" onclick="decreaseQuantity()" class="px-6 py-4 hover:bg-blue-50 transition-colors duration-300 font-bold text-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                    <path d="M20 12H4"/>
                                </svg>
                            </button>
                            <input id="qty" name="quantity" type="number" value="1" min="1" max="{{ $stock }}" class="w-20 text-center text-2xl font-bold py-4 border-x-2 border-blue-100 focus:outline-none bg-transparent" readonly />
                            <button type="button" onclick="increaseQuantity()" class="px-6 py-4 hover:bg-blue-50 transition-colors duration-300 font-bold text-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                    <path d="M12 4v16m8-8H4"/>
                                </svg>
                            </button>
                        </div>
                        <div class="text-right">
                            <div class="text-sm text-gray-500 mb-1">Total</div>
                            <div class="product-price text-3xl font-black" id="totalPrice">{{ number_format($product->price, 0, '', ' ') }} FCFA</div>
                        </div>
                    </div>
                </div>

                <!-- Actions modernisées -->
                <div class="space-y-6">
                    <form action="{{ route('cart.add', $product) }}" method="POST">
                        @csrf
                        <input type="hidden" name="quantity" id="formQty" value="1">
                        <button type="submit" class="btn-primary w-full text-white py-6 rounded-3xl font-bold text-xl flex items-center justify-center gap-3 shadow-2xl relative overflow-hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <circle cx="9" cy="21" r="1"/>
                                <circle cx="20" cy="21" r="1"/>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                            </svg>
                            Ajouter au panier
                        </button>
                    </form>

                    <div class="grid grid-cols-2 gap-4">
                        @if(Auth::check())
                            @if(Auth::user()->isFavorite($product))
                                <form action="{{ route('shop.unfavorite', $product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full bg-gradient-to-r from-red-50 to-pink-50 border-2 border-red-200 text-red-600 py-4 rounded-2xl font-bold text-lg flex items-center justify-center gap-2 hover:from-red-100 hover:to-pink-100 hover:border-red-300 transition-all duration-300 transform hover:scale-105">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.572l-7.5 7.5-7.5-7.5A5.25 5.25 0 0 1 12 6.75a5.25 5.25 0 0 1 7.5 6.822z"/>
                                        </svg>
                                        Favoris ❤️
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('shop.favorite', $product) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full bg-gradient-to-r from-gray-50 to-gray-100 border-2 border-gray-200 text-gray-700 py-4 rounded-2xl font-bold text-lg flex items-center justify-center gap-2 hover:from-blue-50 hover:to-purple-50 hover:border-blue-200 hover:text-blue-600 transition-all duration-300 transform hover:scale-105">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.572l-7.5 7.5-7.5-7.5A5.25 5.25 0 0 1 12 6.75a5.25 5.25 0 0 1 7.5 6.822z"/>
                                        </svg>
                                        Favoris
                                    </button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('login') }}">
                                <button class="w-full bg-gradient-to-r from-gray-50 to-gray-100 border-2 border-gray-200 text-gray-700 py-4 rounded-2xl font-bold text-lg flex items-center justify-center gap-2 hover:from-blue-50 hover:to-purple-50 hover:border-blue-200 hover:text-blue-600 transition-all duration-300 transform hover:scale-105">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.572l-7.5 7.5-7.5-7.5A5.25 5.25 0 0 1 12 6.75a5.25 5.25 0 0 1 7.5 6.822z"/>
                                    </svg>
                                    Favoris
                                </button>
                            </a>
                        @endif

                        <a href="{{ route('shop.index') }}">
                            <button class="w-full bg-gradient-to-r from-gray-50 to-gray-100 border-2 border-gray-200 text-gray-700 py-4 rounded-2xl font-bold text-lg flex items-center justify-center gap-2 hover:from-gray-100 hover:to-gray-200 hover:border-gray-300 transition-all duration-300 transform hover:scale-105">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5M12 19l-7-7 7-7"/>
                                </svg>
                                Retour
                            </button>
                        </a>
                    </div>
                </div>

                <!-- Informations supplémentaires -->
                @if(array_filter($infos))
                    <div class="info-card rounded-3xl p-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Informations produit</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach($infos as $label => $value)
                                @if($value)
                                    <div class="flex items-center space-x-3">
                                        <div class="w-3 h-3 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full"></div>
                                        <div>
                                            <span class="font-semibold text-gray-900">{{ $label }}:</span>
                                            <span class="text-gray-700 ml-2">{{ $value }}</span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        let productPrice = {{ $product->price }};
        let maxStock = {{ $stock }};

        function updateTotal() {
            const qtyInput = document.getElementById('qty');
            const totalPrice = document.getElementById('totalPrice');
            const formQty = document.getElementById('formQty');

            if(qtyInput && totalPrice && formQty) {
                let q = parseInt(qtyInput.value) || 1;
                let total = q * productPrice;
                totalPrice.textContent = total.toLocaleString('fr-FR', {minimumFractionDigits:0, maximumFractionDigits:0}) + ' FCFA';
                formQty.value = q;
            }
        }

        function increaseQuantity() {
            const qtyInput = document.getElementById('qty');
            let currentQty = parseInt(qtyInput.value) || 1;
            if (currentQty < maxStock) {
                qtyInput.value = currentQty + 1;
                updateTotal();
            }
        }

        function decreaseQuantity() {
            const qtyInput = document.getElementById('qty');
            let currentQty = parseInt(qtyInput.value) || 1;
            if (currentQty > 1) {
                qtyInput.value = currentQty - 1;
                updateTotal();
            }
        }

        function changeMainImage(src, button) {
            document.getElementById('mainImage').src = src;

            // Mise à jour des thumbnails actifs
            document.querySelectorAll('.thumbnail-button').forEach(btn => {
                btn.classList.remove('active');
            });
            button.classList.add('active');
        }

        function selectSize(button) {
            document.querySelectorAll('.selection-button').forEach(btn => {
                if (btn.closest('.info-card').querySelector('h3').textContent.includes('taille')) {
                    btn.classList.remove('active');
                }
            });
            button.classList.add('active');
        }

        function selectColor(button) {
            document.querySelectorAll('.selection-button').forEach(btn => {
                if (btn.closest('.info-card').querySelector('h3').textContent.includes('couleur')) {
                    btn.classList.remove('active');
                }
            });
            button.classList.add('active');
        }

        // Animation d'apparition des éléments
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        });

        document.querySelectorAll('.info-card').forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transitionDelay = `${index * 0.1}s`;
            card.style.transition = 'all 0.6s ease';
            observer.observe(card);
        });

        // Initialisation
        document.addEventListener('DOMContentLoaded', function() {
            updateTotal();
        });
    </script>
@endsection
