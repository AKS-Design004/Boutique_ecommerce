@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-blue-50 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-3xl border border-gray-100">
                <div class="p-8 bg-gradient-to-r from-white to-blue-50/30">
                    <!-- En-tête avec titre et navigation -->
                    <div class="flex flex-col lg:flex-row lg:items-center justify-between mb-8">
                        <div class="mb-4 lg:mb-0">
                            <h1 class="text-4xl font-black bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-2">
                                Commande #{{ $order->id }}
                            </h1>
                            <p class="text-gray-600 text-lg">Détails de votre commande</p>
                        </div>
                        <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4">
                            <a href="{{ route('order.history') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-700 to-gray-800 text-white font-semibold rounded-xl hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                                </svg>
                                Retour aux commandes
                            </a>
                            <a href="{{ route('order.invoice', $order) }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-semibold rounded-xl hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Télécharger PDF
                            </a>
                            <a href="{{ route('shop.index') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <circle cx="9" cy="21" r="1"/>
                                    <circle cx="20" cy="21" r="1"/>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                                </svg>
                                Continuer mes achats
                            </a>
                        </div>
                    </div>

                    <!-- Informations de la commande -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                        <!-- Informations générales -->
                        <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg border border-gray-100 p-6">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h2 class="text-2xl font-black text-gray-900">Informations générales</h2>
                            </div>

                            <div class="space-y-4">
                                <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-b-0">
                                    <span class="text-sm font-bold text-gray-600 uppercase tracking-wide">Date de commande</span>
                                    <span class="text-sm font-black text-gray-900">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                                </div>

                                <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-b-0">
                                    <span class="text-sm font-bold text-gray-600 uppercase tracking-wide">Adresse de livraison</span>
                                    <span class="text-sm font-semibold text-gray-900 text-right max-w-xs">{{ $order->address }}</span>
                                </div>

                                <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-b-0">
                                    <span class="text-sm font-bold text-gray-600 uppercase tracking-wide">Téléphone</span>
                                    <span class="text-sm font-black text-gray-900">{{ $order->phone }}</span>
                                </div>

                                <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-b-0">
                                    <span class="text-sm font-bold text-gray-600 uppercase tracking-wide">Méthode de paiement</span>
                                    <span class="text-sm font-black text-gray-900">{{ $order->payment_method === 'en_ligne' ? 'En ligne' : 'À la livraison' }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Statuts et paiement -->
                        <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg border border-gray-100 p-6">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 bg-gradient-to-r from-green-600 to-emerald-600 rounded-xl flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h2 class="text-2xl font-black text-gray-900">Statuts</h2>
                            </div>

                            <div class="space-y-6">
                                <div>
                                    <p class="text-sm font-bold text-gray-600 uppercase tracking-wide mb-2">Statut de la commande</p>
                                    <span class="px-4 py-2 inline-flex text-sm leading-5 font-bold rounded-full shadow-sm
                                        @if($order->status === 'en_attente') bg-gradient-to-r from-yellow-100 to-yellow-200 text-yellow-800
                                        @elseif($order->status === 'expediee') bg-gradient-to-r from-purple-100 to-purple-200 text-purple-800
                                        @elseif($order->status === 'livree') bg-gradient-to-r from-green-100 to-green-200 text-green-800
                                        @elseif($order->status === 'annulee') bg-gradient-to-r from-red-100 to-red-200 text-red-800
                                        @else bg-gradient-to-r from-gray-100 to-gray-200 text-gray-800 @endif">
                                        {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                                    </span>
                                </div>

                                <div>
                                    <p class="text-sm font-bold text-gray-600 uppercase tracking-wide mb-2">Statut du paiement</p>
                                    <span class="px-4 py-2 inline-flex text-sm leading-5 font-bold rounded-full shadow-sm
                                        @if($order->payment_status === 'paye') bg-gradient-to-r from-green-100 to-emerald-200 text-green-800
                                        @elseif($order->payment_status === 'en_attente') bg-gradient-to-r from-yellow-100 to-yellow-200 text-yellow-800
                                        @else bg-gradient-to-r from-red-100 to-red-200 text-red-800 @endif">
                                        {{ ucfirst($order->payment_status) }}
                                    </span>
                                </div>

                                @if($order->payment)
                                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-4 border border-green-100">
                                        <div class="space-y-3">
                                            <div class="flex items-center justify-between">
                                                <span class="text-sm font-bold text-green-700">Montant payé</span>
                                                <span class="text-lg font-black text-green-800">{{ number_format($order->payment->amount, 0, '', ' ') }} <span class="text-sm">FCFA</span></span>
                                            </div>
                                            @if($order->payment->paid_at)
                                                <div class="flex items-center justify-between">
                                                    <span class="text-sm font-bold text-green-700">Date de paiement</span>
                                                    <span class="text-sm font-semibold text-green-800">{{ \Illuminate\Support\Carbon::parse($order->payment->paid_at)->format('d/m/Y H:i') }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Produits commandés -->
                    <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                        <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-white to-blue-50/30">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                    </svg>
                                </div>
                                <h2 class="text-2xl font-black text-gray-900">Produits commandés</h2>
                            </div>
                        </div>

                        <!-- Version Desktop -->
                        <div class="hidden lg:block">
                            <div class="overflow-x-auto">
                                <table class="min-w-full">
                                    <thead>
                                    <tr class="bg-gradient-to-r from-gray-100 to-gray-50">
                                        <th class="px-6 py-5 text-left text-sm font-black text-gray-700 uppercase tracking-wider">
                                            <div class="flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                                </svg>
                                                Produit
                                            </div>
                                        </th>
                                        <th class="px-6 py-5 text-left text-sm font-black text-gray-700 uppercase tracking-wider">
                                            <div class="flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                                </svg>
                                                Prix unitaire
                                            </div>
                                        </th>
                                        <th class="px-6 py-5 text-left text-sm font-black text-gray-700 uppercase tracking-wider">
                                            <div class="flex items-center">
                                                <svg class="w-4 h-4 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                                </svg>
                                                Quantité
                                            </div>
                                        </th>
                                        <th class="px-6 py-5 text-right text-sm font-black text-gray-700 uppercase tracking-wider">
                                            <div class="flex items-center justify-end">
                                                <svg class="w-4 h-4 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                                </svg>
                                                Total
                                            </div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-100">
                                    @foreach($order->orderItems as $item)
                                        <tr class="hover:bg-gradient-to-r hover:from-blue-50/50 hover:to-purple-50/50 transition-all duration-300">
                                            <td class="px-6 py-5 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center mr-3">
                                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                                        </svg>
                                                    </div>
                                                    <span class="text-sm font-black text-gray-900">{{ $item->product->name ?? 'Produit supprimé' }}</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-5 whitespace-nowrap text-sm font-black text-gray-900">
                                                {{ number_format($item->price, 0, '', ' ') }}<span class="text-xs font-medium text-gray-600 ml-1">FCFA</span>
                                            </td>
                                            <td class="px-6 py-5 whitespace-nowrap">
                                                    <span class="px-3 py-1 inline-flex text-sm leading-5 font-bold rounded-full bg-gradient-to-r from-gray-100 to-gray-200 text-gray-800">
                                                        {{ $item->quantity }}
                                                    </span>
                                            </td>
                                            <td class="px-6 py-5 whitespace-nowrap text-right text-sm font-black text-gray-900">
                                                {{ number_format($item->price * $item->quantity, 0, '', ' ') }}<span class="text-xs font-medium text-gray-600 ml-1">FCFA</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Version Mobile -->
                        <div class="lg:hidden">
                            <div class="p-6 space-y-4">
                                @foreach($order->orderItems as $item)
                                    <div class="bg-white p-4 rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-center justify-between mb-3">
                                            <div class="flex items-center">
                                                <div class="w-8 h-8 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center mr-3">
                                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                                    </svg>
                                                </div>
                                                <span class="text-sm font-black text-gray-900">{{ $item->product->name ?? 'Produit supprimé' }}</span>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-3 gap-4 text-center">
                                            <div>
                                                <p class="text-xs font-bold text-gray-500 uppercase tracking-wide mb-1">Prix</p>
                                                <p class="text-sm font-black text-gray-900">{{ number_format($item->price, 0, '', ' ') }} <span class="text-xs text-gray-600">FCFA</span></p>
                                            </div>
                                            <div>
                                                <p class="text-xs font-bold text-gray-500 uppercase tracking-wide mb-1">Quantité</p>
                                                <span class="px-2 py-1 inline-flex text-xs leading-4 font-bold rounded-full bg-gradient-to-r from-gray-100 to-gray-200 text-gray-800">
                                                    {{ $item->quantity }}
                                                </span>
                                            </div>
                                            <div>
                                                <p class="text-xs font-bold text-gray-500 uppercase tracking-wide mb-1">Total</p>
                                                <p class="text-sm font-black text-gray-900">{{ number_format($item->price * $item->quantity, 0, '', ' ') }} <span class="text-xs text-gray-600">FCFA</span></p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Total de la commande -->
                        <div class="bg-gradient-to-r from-blue-600 to-purple-600 px-6 py-8">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-xl flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <span class="text-2xl font-black text-white">Total de la commande</span>
                                </div>
                                <span class="text-3xl font-black text-white">{{ number_format($order->total, 0, '', ' ') }} <span class="text-xl">FCFA</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
