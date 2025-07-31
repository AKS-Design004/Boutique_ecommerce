@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-blue-50 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-3xl border border-gray-100">
                <div class="p-8 bg-gradient-to-r from-white to-blue-50/30">

                    <!-- En-tête du Dashboard -->
                    <div class="flex flex-col lg:flex-row lg:items-center justify-between mb-8">
                        <div class="mb-4 lg:mb-0">
                            <h1 class="text-4xl font-black bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-2">
                                Dashboard Administrateur
                            </h1>
                            <p class="text-gray-600 text-lg">Vue d'ensemble de votre boutique e-commerce</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                            <span class="text-sm font-medium text-gray-600">En ligne</span>
                        </div>
                    </div>

                    <!-- Statistiques principales -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                        <!-- Chiffre d'affaires -->
                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl shadow-lg border border-green-100 p-6 hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-500 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                    </svg>
                                </div>
                                <div class="px-3 py-1 bg-green-200 text-green-800 rounded-full text-xs font-bold">+12%</div>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-green-700 uppercase tracking-wide mb-1">Chiffre d'affaires</p>
                                <p class="text-2xl font-black text-gray-900 mb-1">{{ number_format($chiffreAffaires, 0, '', ' ') }} <span class="text-sm font-medium text-gray-600">FCFA</span></p>
                                <p class="text-sm text-green-600 font-medium">ce mois</p>
                            </div>
                        </div>

                        <!-- Commandes -->
                        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl shadow-lg border border-blue-100 p-6 hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                    </svg>
                                </div>
                                <div class="px-3 py-1 bg-blue-200 text-blue-800 rounded-full text-xs font-bold">+8%</div>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-blue-700 uppercase tracking-wide mb-1">Commandes</p>
                                <p class="text-2xl font-black text-gray-900 mb-1">{{ $nbCommandes }}</p>
                                <p class="text-sm text-blue-600 font-medium">ce mois</p>
                            </div>
                        </div>

                        <!-- Clients -->
                        <div class="bg-gradient-to-br from-purple-50 to-violet-50 rounded-2xl shadow-lg border border-purple-100 p-6 hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-violet-500 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <div class="px-3 py-1 bg-purple-200 text-purple-800 rounded-full text-xs font-bold">+15%</div>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-purple-700 uppercase tracking-wide mb-1">Clients</p>
                                <p class="text-2xl font-black text-gray-900 mb-1">{{ $nbClients }}</p>
                                <p class="text-sm text-purple-600 font-medium">ce mois</p>
                            </div>
                        </div>

                        <!-- Produits -->
                        <div class="bg-gradient-to-br from-orange-50 to-amber-50 rounded-2xl shadow-lg border border-orange-100 p-6 hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-amber-500 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                                <div class="px-3 py-1 bg-orange-200 text-orange-800 rounded-full text-xs font-bold">+5%</div>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-orange-700 uppercase tracking-wide mb-1">Produits</p>
                                <p class="text-2xl font-black text-gray-900 mb-1">{{ $nbProduits ?? 0 }}</p>
                                <p class="text-sm text-orange-600 font-medium">ce mois</p>
                            </div>
                        </div>
                    </div>

                    <!-- Graphiques et tableaux -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                        <!-- Produits les plus vendus -->
                        <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                            <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-white to-blue-50/30">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl flex items-center justify-center mr-4">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                            </svg>
                                        </div>
                                        <h2 class="text-2xl font-black text-gray-900">Produits les plus vendus</h2>
                                    </div>
                                    <a href="{{ route('admin.products.index') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-100 to-blue-200 text-blue-700 font-bold rounded-lg hover:from-blue-200 hover:to-blue-300 transition-all duration-300 transform hover:scale-105">
                                        <span class="mr-2">Voir tout</span>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="space-y-4">
                                    @forelse($produitsTop as $item)
                                        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-gray-50 to-blue-50/50 rounded-xl hover:from-blue-50 hover:to-purple-50 transition-all duration-300">
                                            <div class="flex items-center space-x-4">
                                                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold shadow-lg">
                                                    {{ $loop->iteration }}
                                                </div>
                                                <div>
                                                    <p class="font-black text-gray-900">{{ $item->product->name ?? 'Produit supprimé' }}</p>
                                                    <p class="text-sm font-medium text-gray-600">{{ $item->product->category->name ?? 'Sans catégorie' }}</p>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <p class="text-lg font-black text-gray-900">{{ $item->total_vendus }}</p>
                                                <p class="text-sm font-medium text-gray-600">unités vendues</p>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="text-center py-12">
                                            <div class="w-20 h-20 bg-gradient-to-r from-gray-100 to-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                                </svg>
                                            </div>
                                            <h3 class="text-lg font-black text-gray-900 mb-2">Aucun produit vendu</h3>
                                            <p class="text-gray-600">Les statistiques apparaîtront ici une fois les premières ventes effectuées.</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <!-- Commandes récentes -->
                        <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                            <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-white to-green-50/30">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 bg-gradient-to-r from-green-600 to-emerald-600 rounded-xl flex items-center justify-center mr-4">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                            </svg>
                                        </div>
                                        <h2 class="text-2xl font-black text-gray-900">Commandes récentes</h2>
                                    </div>
                                    <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-green-100 to-emerald-200 text-green-700 font-bold rounded-lg hover:from-green-200 hover:to-emerald-300 transition-all duration-300 transform hover:scale-105">
                                        <span class="mr-2">Voir tout</span>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="space-y-4">
                                    @forelse($commandesRecentes ?? [] as $commande)
                                        <div class="flex items-center justify-between p-4 bg-gradient-to-r from-gray-50 to-green-50/50 rounded-xl hover:from-green-50 hover:to-emerald-50 transition-all duration-300">
                                            <div class="flex items-center space-x-4">
                                                <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full flex items-center justify-center text-white font-bold shadow-lg">
                                                    <span class="text-xs">#{{ substr($commande->id, -2) }}</span>
                                                </div>
                                                <div>
                                                    <p class="font-black text-gray-900">{{ $commande->user->name ?? 'Client supprimé' }}</p>
                                                    <p class="text-sm font-medium text-gray-600">{{ $commande->created_at->format('d/m/Y H:i') }}</p>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <p class="text-lg font-black text-gray-900">{{ number_format($commande->total, 0, '', ' ') }} <span class="text-sm font-medium text-gray-600">FCFA</span></p>
                                                <span class="px-3 py-1 inline-flex text-xs leading-4 font-bold rounded-full
                                                @if($commande->status === 'en_attente') bg-gradient-to-r from-yellow-100 to-yellow-200 text-yellow-800
                                                @elseif($commande->status === 'expediee') bg-gradient-to-r from-purple-100 to-purple-200 text-purple-800
                                                @elseif($commande->status === 'livree') bg-gradient-to-r from-green-100 to-green-200 text-green-800
                                                @elseif($commande->status === 'annulee') bg-gradient-to-r from-red-100 to-red-200 text-red-800
                                                @else bg-gradient-to-r from-gray-100 to-gray-200 text-gray-800 @endif">
                                                {{ ucfirst(str_replace('_', ' ', $commande->status)) }}
                                            </span>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="text-center py-12">
                                            <div class="w-20 h-20 bg-gradient-to-r from-gray-100 to-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                                </svg>
                                            </div>
                                            <h3 class="text-lg font-black text-gray-900 mb-2">Aucune commande récente</h3>
                                            <p class="text-gray-600">Les nouvelles commandes apparaîtront ici.</p>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions rapides -->
                    <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg border border-gray-100 p-6">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-black text-gray-900">Actions rapides</h2>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <a href="/admin/products/create" class="group flex items-center p-6 bg-gradient-to-r from-blue-500 to-purple-500 rounded-2xl text-white hover:from-blue-600 hover:to-purple-600 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mr-4 group-hover:bg-opacity-30 transition-all duration-300">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-black text-lg">Ajouter</p>
                                    <p class="text-sm opacity-90">un produit</p>
                                </div>
                            </a>

                            <a href="{{ route('admin.categories.create') }}" class="group flex items-center p-6 bg-gradient-to-r from-green-500 to-emerald-500 rounded-2xl text-white hover:from-green-600 hover:to-emerald-600 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mr-4 group-hover:bg-opacity-30 transition-all duration-300">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-black text-lg">Créer</p>
                                    <p class="text-sm opacity-90">une catégorie</p>
                                </div>
                            </a>

                            <a href="{{ route('admin.orders.index') }}" class="group flex items-center p-6 bg-gradient-to-r from-orange-500 to-red-500 rounded-2xl text-white hover:from-orange-600 hover:to-red-600 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mr-4 group-hover:bg-opacity-30 transition-all duration-300">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-black text-lg">Gérer</p>
                                    <p class="text-sm opacity-90">les commandes</p>
                                </div>
                            </a>

                            <a href="{{ route('admin.users.index') }}" class="group flex items-center p-6 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl text-white hover:from-purple-600 hover:to-pink-600 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mr-4 group-hover:bg-opacity-30 transition-all duration-300">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-black text-lg">Administrer</p>
                                    <p class="text-sm opacity-90">les utilisateurs</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
