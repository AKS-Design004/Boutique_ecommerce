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
                                Détail de la commande #{{ $order->id }}
                            </h1>
                            <p class="text-gray-600 text-lg">Consultez les détails de la commande</p>
                        </div>
                        <a href="{{ route('admin.orders.index') }}" class="group inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-200 to-gray-300 text-gray-700 font-bold rounded-2xl hover:from-gray-300 hover:to-gray-400 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                            Retour aux commandes
                        </a>
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

                    <!-- Informations client -->
                    <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <h2 class="text-xl font-black text-gray-900">Informations client</h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <p><span class="font-bold text-gray-700">Nom :</span> {{ $order->user->name ?? '-' }}</p>
                            <p><span class="font-bold text-gray-700">Email :</span> {{ $order->user->email ?? '-' }}</p>
                            <p><span class="font-bold text-gray-700">Adresse :</span> {{ $order->address }}</p>
                            <p><span class="font-bold text-gray-700">Téléphone :</span> {{ $order->phone }}</p>
                        </div>
                    </div>

                    <!-- Produits commandés -->
                    <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3V3zm2 2v14h14V5H5zm2 2h10v10H7V7zm2 2v6h6V9H9z"/>
                                </svg>
                            </div>
                            <h2 class="text-xl font-black text-gray-900">Produits commandés</h2>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead>
                                <tr class="bg-gradient-to-r from-gray-100 to-purple-50/50">
                                    <th class="py-4 px-6 text-left">
                                        <span class="text-sm font-black text-gray-700 uppercase tracking-wide">Produit</span>
                                    </th>
                                    <th class="py-4 px-6 text-left">
                                        <span class="text-sm font-black text-gray-700 uppercase tracking-wide">Prix</span>
                                    </th>
                                    <th class="py-4 px-6 text-left">
                                        <span class="text-sm font-black text-gray-700 uppercase tracking-wide">Quantité</span>
                                    </th>
                                    <th class="py-4 px-6 text-left">
                                        <span class="text-sm font-black text-gray-700 uppercase tracking-wide">Total</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                @foreach($order->orderItems as $item)
                                    <tr class="hover:bg-gradient-to-r hover:from-purple-50/30 hover:to-pink-50/30 transition-all duration-300">
                                        <td class="py-6 px-6">
                                            <span class="text-gray-600 font-medium">{{ $item->product->name ?? '-' }}</span>
                                        </td>
                                        <td class="py-6 px-6">
                                            <span class="text-gray-600 font-medium">{{ number_format($item->price, 0, '', ' ') }} FCFA</span>
                                        </td>
                                        <td class="py-6 px-6">
                                            <span class="text-gray-600 font-medium">{{ $item->quantity }}</span>
                                        </td>
                                        <td class="py-6 px-6">
                                            <span class="text-gray-600 font-medium">{{ number_format($item->price * $item->quantity, 0, '', ' ') }} FCFA</span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-right mt-4">
                            <span class="text-lg font-bold text-gray-900">Total : {{ number_format($order->total, 0, '', ' ') }} FCFA</span>
                        </div>
                    </div>

                    <!-- Statut & Paiement -->
                    <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg border border-gray-100 p-6 mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <h2 class="text-xl font-black text-gray-900">Statut & Paiement</h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <p><span class="font-bold text-gray-700">Statut :</span>
                                <span class="px-3 py-1 rounded-xl text-sm font-bold {{
                                    $order->status === 'en_attente' ? 'bg-gradient-to-r from-yellow-100 to-orange-100 text-yellow-800' :
                                    ($order->status === 'expediee' ? 'bg-gradient-to-r from-blue-100 to-cyan-100 text-blue-800' :
                                    ($order->status === 'livree' ? 'bg-gradient-to-r from-green-100 to-emerald-100 text-green-800' : 'bg-gradient-to-r from-red-100 to-pink-100 text-red-800'))
                                }}">
                                    {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                                </span>
                            </p>
                            <p><span class="font-bold text-gray-700">Paiement :</span>
                                <span class="px-3 py-1 rounded-xl text-sm font-bold {{
                                    $order->payment_status === 'paye' ? 'bg-gradient-to-r from-green-100 to-emerald-100 text-green-800' : 'bg-gradient-to-r from-gray-100 to-gray-200 text-gray-800'
                                }}">
                                    {{ ucfirst($order->payment_status) }}
                                </span>
                            </p>
                            <p><span class="font-bold text-gray-700">Méthode :</span> {{ $order->payment_method === 'en_ligne' ? 'En ligne' : 'À la livraison' }}</p>
                            @if($order->payment)
                                <p><span class="font-bold text-gray-700">Montant payé :</span> {{ number_format($order->payment->amount, 0, '', ' ') }} FCFA</p>
                                <p><span class="font-bold text-gray-700">Date paiement :</span> {{ $order->payment && $order->payment->paid_at ? \Illuminate\Support\Carbon::parse($order->payment->paid_at)->format('d/m/Y H:i') : '-' }}</p>
                            @endif
                        </div>
                    </div>

                    <!-- Boutons d'action -->
                    <div class="flex items-center justify-end space-x-4">
                        <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-200 to-gray-300 text-gray-700 font-bold rounded-2xl hover:from-gray-300 hover:to-gray-400 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                            Retour
                        </a>
                        <a href="{{ route('admin.order.invoice', $order) }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-100 to-cyan-200 text-blue-700 font-bold rounded-2xl hover:from-blue-200 hover:to-cyan-300 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Facture PDF
                        </a>
                        <a href="{{ route('admin.orders.edit', $order) }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold rounded-2xl hover:from-purple-600 hover:to-pink-600 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Modifier
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
