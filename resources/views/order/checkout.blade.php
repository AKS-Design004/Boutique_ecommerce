@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-purple-50 py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-3xl border border-gray-100">
                <div class="p-8 bg-gradient-to-r from-white to-purple-50/30">

                    <!-- Titre -->
                    <div class="mb-8">
                        <h1 class="text-4xl font-black bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent mb-2">
                            Valider ma commande
                        </h1>
                        <p class="text-gray-600 text-lg">Vérifiez vos informations avant de finaliser la commande</p>
                    </div>

                    <!-- Messages d'erreur -->
                    @if($errors->any())
                        <div class="mb-6 p-4 bg-gradient-to-r from-red-50 to-pink-50 border border-red-200 rounded-2xl">
                            <ul class="list-disc list-inside text-red-800 font-medium">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Récapitulatif -->
                    <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden mb-8">
                        <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-white to-purple-50/30">
                            <h2 class="text-xl font-black text-gray-900">Récapitulatif</h2>
                        </div>
                        <table class="min-w-full text-sm">
                            <thead>
                            <tr class="bg-gradient-to-r from-gray-100 to-purple-50/50">
                                <th class="py-4 px-6 text-left font-black text-gray-700 uppercase">Produit</th>
                                <th class="py-4 px-6 text-left font-black text-gray-700 uppercase">Prix</th>
                                <th class="py-4 px-6 text-left font-black text-gray-700 uppercase">Quantité</th>
                                <th class="py-4 px-6 text-left font-black text-gray-700 uppercase">Total</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                            @foreach($cart as $item)
                                <tr class="hover:bg-gradient-to-r hover:from-purple-50/30 hover:to-pink-50/30 transition-all duration-300">
                                    <td class="py-4 px-6 text-gray-900">{{ $item['name'] }}</td>
                                    <td class="py-4 px-6 text-gray-600">{{ number_format($item['price'], 2, ',', ' ') }} FCFA</td>
                                    <td class="py-4 px-6 text-gray-600">{{ $item['quantity'] }}</td>
                                    <td class="py-4 px-6 text-gray-800 font-bold">{{ number_format($item['price'] * $item['quantity'], 2, ',', ' ') }} FCFA</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="p-6 text-right text-xl font-black text-gray-800 bg-gradient-to-r from-white to-purple-50/30 border-t border-gray-100">
                            Total : {{ number_format($total, 2, ',', ' ') }} FCFA
                        </div>
                    </div>

                    <!-- Formulaire de commande -->
                    <form action="{{ route('order.process') }}" method="POST" class="bg-gradient-to-br from-white to-purple-50/20 rounded-2xl shadow-lg border border-gray-100 p-6">
                        @csrf

                        <div class="mb-6">
                            <label for="address" class="block font-semibold text-gray-700 mb-2">Adresse de livraison</label>
                            <input type="text" name="address" id="address" value="{{ old('address') }}" required
                                   class="w-full border border-gray-300 rounded-xl px-4 py-3 shadow-inner focus:ring-2 focus:ring-purple-400">
                        </div>

                        <div class="mb-6">
                            <label for="phone" class="block font-semibold text-gray-700 mb-2">Téléphone</label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required
                                   class="w-full border border-gray-300 rounded-xl px-4 py-3 shadow-inner focus:ring-2 focus:ring-purple-400">
                        </div>

                        <div class="mb-6">
                            <label class="block font-semibold text-gray-700 mb-2">Mode de paiement</label>
                            <div class="flex flex-col gap-3 md:flex-row md:gap-6">
                                <label class="flex items-center gap-3 text-sm text-gray-700">
                                    <input type="radio" name="payment_method" value="en_ligne"
                                           {{ old('payment_method') == 'en_ligne' ? 'checked' : '' }} required>
                                    Paiement en ligne (simulation)
                                </label>
                                <label class="flex items-center gap-3 text-sm text-gray-700">
                                    <input type="radio" name="payment_method" value="a_la_livraison"
                                           {{ old('payment_method') == 'a_la_livraison' ? 'checked' : '' }} required>
                                    Paiement à la livraison
                                </label>
                            </div>
                        </div>

                        <button type="submit"
                                class="w-full mt-4 bg-gradient-to-r from-green-500 to-emerald-500 text-white font-bold py-3 rounded-2xl hover:from-green-600 hover:to-emerald-600 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            Valider la commande
                        </button>
                    </form>

                    <!-- Lien retour -->
                    <div class="mt-6 text-center">
                        <a href="{{ route('cart.index') }}" class="text-sm text-gray-600 hover:underline">&larr; Retour au panier</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
