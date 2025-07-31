@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-purple-50 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-3xl border border-gray-100">
                <div class="p-8 bg-gradient-to-r from-white to-purple-50/30">
                    <!-- En-tête de la page -->
                    <div class="flex flex-col lg:flex-row lg:items-center justify-between mb-8">
                        <div class="mb-4 lg:mb-0">
                            <h1 class="text-4xl font-black bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent mb-2">
                                Gestion des produits
                            </h1>
                            <p class="text-gray-600 text-lg">Organisez et gérez les produits de votre boutique</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center space-x-2">
                                <div class="w-3 h-3 bg-purple-500 rounded-full animate-pulse"></div>
                                <span class="text-sm font-medium text-gray-600">{{ $products->total() ?? 0 }} produits</span>
                            </div>
                            <a href="{{ route('admin.products.create') }}" class="group inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold rounded-2xl hover:from-purple-600 hover:to-pink-600 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                <svg class="w-5 h-5 mr-2 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Nouveau produit
                            </a>
                        </div>
                    </div>

                    <!-- Message de succès -->
                    @if(session('success'))
                        <div class="mb-8 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-2xl">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <p class="font-bold text-green-800">{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif

                    <!-- Tableau des produits -->
                    <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                        <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-white to-purple-50/30">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3V3zm2 2v14h14V5H5zm2 2h10v10H7V7zm2 2v6h6V9H9z"/>
                                    </svg>
                                </div>
                                <h2 class="text-2xl font-black text-gray-900">Liste des produits</h2>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead>
                                <tr class="bg-gradient-to-r from-gray-100 to-purple-50/50">
                                    <th class="py-4 px-6 text-left">
                                        <span class="text-sm font-black text-gray-700 uppercase tracking-wide">Image</span>
                                    </th>
                                    <th class="py-4 px-6 text-left">
                                        <span class="text-sm font-black text-gray-700 uppercase tracking-wide">Nom</span>
                                    </th>
                                    <th class="py-4 px-6 text-left">
                                        <span class="text-sm font-black text-gray-700 uppercase tracking-wide">Catégorie</span>
                                    </th>
                                    <th class="py-4 px-6 text-left">
                                        <span class="text-sm font-black text-gray-700 uppercase tracking-wide">Prix</span>
                                    </th>
                                    <th class="py-4 px-6 text-left">
                                        <span class="text-sm font-black text-gray-700 uppercase tracking-wide">Stock</span>
                                    </th>
                                    <th class="py-4 px-6 text-right">
                                        <span class="text-sm font-black text-gray-700 uppercase tracking-wide">Actions</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                @forelse($products as $product)
                                    <tr class="hover:bg-gradient-to-r hover:from-purple-50/30 hover:to-pink-50/30 transition-all duration-300 group">
                                        <td class="py-6 px-6">
                                            @if($product->primaryImage)
                                                <div class="relative">
                                                    <img src="{{ asset($product->primaryImage->path) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded-2xl shadow-lg border-2 border-white group-hover:shadow-xl group-hover:scale-105 transition-all duration-300">
                                                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-2xl"></div>
                                                </div>
                                            @else
                                                <div class="w-16 h-16 bg-gradient-to-br from-gray-200 to-purple-200 rounded-2xl flex items-center justify-center shadow-lg group-hover:from-purple-200 group-hover:to-pink-200 group-hover:scale-105 transition-all duration-300">
                                                    <svg class="h-8 w-8 text-gray-500 group-hover:text-purple-600 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                    </svg>
                                                </div>
                                            @endif
                                        </td>
                                        <td class="py-6 px-6">
                                            <div class="flex items-center">
                                                <div class="w-3 h-3 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mr-3 group-hover:scale-125 transition-transform duration-300"></div>
                                                <span class="font-black text-gray-900 text-lg group-hover:text-purple-600 transition-colors duration-300">{{ $product->name }}</span>
                                            </div>
                                        </td>
                                        <td class="py-6 px-6">
                                            <span class="text-gray-600 font-medium">{{ $product->category->name ?? '-' }}</span>
                                        </td>
                                        <td class="py-6 px-6">
                                            <span class="text-gray-600 font-medium">{{ number_format($product->price, 0, '', ' ') }} FCFA</span>
                                        </td>
                                        <td class="py-6 px-6">
                                            <span class="text-gray-600 font-medium">{{ $product->stock }}</span>
                                        </td>
                                        <td class="py-6 px-6 text-right">
                                            <div class="flex items-center justify-end space-x-2">
                                                <a href="{{ route('admin.products.edit', $product) }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-yellow-100 to-orange-200 text-yellow-700 font-bold rounded-xl hover:from-yellow-200 hover:to-orange-300 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                    </svg>
                                                    Éditer
                                                </a>
                                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-red-100 to-pink-200 text-red-700 font-bold rounded-xl hover:from-red-200 hover:to-pink-300 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                        Supprimer
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="py-16">
                                            <div class="text-center">
                                                <div class="w-24 h-24 bg-gradient-to-r from-gray-100 to-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                                    <svg class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3V3zm2 2v14h14V5H5zm2 2h10v10H7V7zm2 2v6h6V9H9z"/>
                                                    </svg>
                                                </div>
                                                <h3 class="text-xl font-black text-gray-900 mb-2">Aucun produit trouvé</h3>
                                                <p class="text-gray-600 mb-6">Commencez par créer votre premier produit pour enrichir votre boutique.</p>
                                                <a href="{{ route('admin.products.create') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold rounded-2xl hover:from-purple-600 hover:to-pink-600 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                                    </svg>
                                                    Créer un produit
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        @if($products->hasPages())
                            <div class="p-6 border-t border-gray-100 bg-gradient-to-r from-white to-purple-50/30">
                                <div class="flex items-center justify-between">
                                    <div class="text-sm text-gray-600 font-medium">
                                        Affichage de {{ $products->firstItem() }} à {{ $products->lastItem() }} sur {{ $products->total() }} résultats
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        {{ $products->links('pagination::tailwind') }}
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Statistiques rapides -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                        <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl shadow-lg border border-purple-100 p-6 hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3V3zm2 2v14h14V5H5zm2 2h10v10H7V7zm2 2v6h6V9H9z"/>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-purple-700 uppercase tracking-wide mb-1">Total produits</p>
                                <p class="text-2xl font-black text-gray-900">{{ $products->total() ?? 0 }}</p>
                            </div>
                        </div>
                        <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl shadow-lg border border-blue-100 p-6 hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-blue-700 uppercase tracking-wide mb-1">Avec images</p>
                                <p class="text-2xl font-black text-gray-900">{{ $products->whereNotNull('primaryImage')->count() }}</p>
                            </div>
                        </div>
                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl shadow-lg border border-green-100 p-6 hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-500 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-green-700 uppercase tracking-wide mb-1">Actions rapides</p>
                                <a href="{{ route('admin.products.create') }}" class="text-sm font-bold text-green-600 hover:text-green-800 transition-colors">Ajouter un produit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
< ! - -   I n t e r f a c e   d e   g e s t i o n   d e s   p r o d u i t s   - - >  
 