@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-purple-50 py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-3xl border border-gray-100">
                <div class="p-8 bg-gradient-to-r from-white to-purple-50/30">

                    <!-- Titre -->
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h1 class="text-4xl font-black bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent mb-2">
                                Mon panier
                            </h1>
                            <p class="text-gray-600 text-lg">Retrouvez tous les produits que vous avez ajoutés</p>
                        </div>
                        <a href="{{ route('shop.index') }}" class="text-sm text-gray-600 hover:underline">&larr; Continuer mes achats</a>
                    </div>

                    <!-- Message de succès -->
                    @if(session('success'))
                        <div class="mb-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-2xl">
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

                    @if(count($cart))
                        <!-- Tableau du panier -->
                        <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                            <table class="min-w-full">
                                <thead>
                                <tr class="bg-gradient-to-r from-gray-100 to-purple-50/50">
                                    <th class="py-4 px-6 text-left text-sm font-black text-gray-700 uppercase tracking-wide">Produit</th>
                                    <th class="py-4 px-6 text-left text-sm font-black text-gray-700 uppercase tracking-wide">Prix</th>
                                    <th class="py-4 px-6 text-left text-sm font-black text-gray-700 uppercase tracking-wide">Quantité</th>
                                    <th class="py-4 px-6 text-left text-sm font-black text-gray-700 uppercase tracking-wide">Total</th>
                                    <th class="py-4 px-6 text-right text-sm font-black text-gray-700 uppercase tracking-wide">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                @foreach($cart as $id => $item)
                                    <tr class="hover:bg-gradient-to-r hover:from-purple-50/30 hover:to-pink-50/30 transition-all duration-300 group">
                                        <td class="py-6 px-6 flex items-center gap-4">
                                            @if($item['image'])
                                                <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="h-12 w-12 object-cover rounded-xl shadow-md group-hover:scale-105 transition-transform duration-300">
                                            @endif
                                            <span class="text-sm font-medium text-gray-900 group-hover:text-purple-600 transition-colors duration-300">{{ $item['name'] }}</span>
                                        </td>
                                        <td class="py-6 px-6 text-sm text-gray-700 font-medium">{{ number_format($item['price'], 0, '', ' ') }} FCFA</td>
                                        <td class="py-6 px-6">
                                            <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center gap-2">
                                                @csrf
                                                @method('PATCH')
                                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-20 border rounded-xl px-3 py-1 shadow-inner">
                                                <button class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-bold px-4 py-2 rounded-xl transition-all duration-300 transform hover:scale-105">
                                                    Modifier
                                                </button>
                                            </form>
                                        </td>
                                        <td class="py-6 px-6 text-sm text-gray-700 font-medium">{{ number_format($item['price'] * $item['quantity'], 0, '', ' ') }} FCFA</td>
                                        <td class="py-6 px-6 text-right">
                                            <form action="{{ route('cart.remove', $id) }}" method="POST" onsubmit="return confirm('Retirer ce produit ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-red-500 to-pink-500 text-white font-bold rounded-xl hover:from-red-600 hover:to-pink-600 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                                    Supprimer
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <!-- Total -->
                            <div class="p-6 text-right font-black text-xl text-gray-800 bg-gradient-to-r from-white to-purple-50/30 border-t border-gray-100">
                                Total : {{ number_format($total, 0, '', ' ') }} FCFA
                            </div>
                        </div>

                        <!-- Boutons d'action -->
                        <div class="mt-8 text-right">
                            @auth
                                <a href="{{ route('order.checkout') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-500 text-white font-bold rounded-2xl hover:from-green-600 hover:to-emerald-600 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                    Valider la commande
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-500 text-white font-bold rounded-2xl hover:from-green-600 hover:to-emerald-600 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                    Se connecter pour commander
                                </a>
                            @endauth
                        </div>
                    @else
                        <!-- Panier vide -->
                        <div class="text-center py-20">
                            <div class="w-24 h-24 bg-gradient-to-r from-gray-100 to-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.4 5M10 21h4a2 2 0 002-2v-2H8v2a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <h2 class="text-xl font-black text-gray-900 mb-2">Votre panier est vide</h2>
                            <p class="text-gray-600">Ajoutez des articles pour les voir ici.</p>
                            <a href="{{ route('shop.index') }}" class="mt-6 inline-block text-purple-600 hover:underline text-sm font-medium">
                                &larr; Revenir à la boutique
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
