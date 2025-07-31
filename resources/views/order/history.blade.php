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
                                Mes Commandes
                            </h1>
                            <p class="text-gray-600 text-lg">Historique complet de vos achats</p>
                        </div>
                        <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-4">
                            <a href="{{ route('client.dashboard') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-700 to-gray-800 text-white font-semibold rounded-xl hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                                    <path d="M8 1v6"/>
                                </svg>
                                Tableau de bord
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

                    <!-- Tableau des commandes -->
                    <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                        @if($orders->count() > 0)
                            <!-- Version Desktop -->
                            <div class="hidden lg:block">
                                <div class="overflow-x-auto">
                                    <table class="min-w-full">
                                        <thead>
                                        <tr class="bg-gradient-to-r from-gray-100 to-gray-50">
                                            <th class="px-6 py-5 text-left text-sm font-black text-gray-700 uppercase tracking-wider rounded-tl-2xl">
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                                    </svg>
                                                    Commande
                                                </div>
                                            </th>
                                            <th class="px-6 py-5 text-left text-sm font-black text-gray-700 uppercase tracking-wider">
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 9l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    Date
                                                </div>
                                            </th>
                                            <th class="px-6 py-5 text-left text-sm font-black text-gray-700 uppercase tracking-wider">
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                                    </svg>
                                                    Total
                                                </div>
                                            </th>
                                            <th class="px-6 py-5 text-left text-sm font-black text-gray-700 uppercase tracking-wider">
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    Statut
                                                </div>
                                            </th>
                                            <th class="px-6 py-5 text-left text-sm font-black text-gray-700 uppercase tracking-wider">
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 mr-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                                    </svg>
                                                    Paiement
                                                </div>
                                            </th>
                                            <th class="px-6 py-5 text-right text-sm font-black text-gray-700 uppercase tracking-wider rounded-tr-2xl">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-100">
                                        @foreach($orders as $order)
                                            <tr class="hover:bg-gradient-to-r hover:from-blue-50/50 hover:to-purple-50/50 transition-all duration-300">
                                                <td class="px-6 py-5 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="w-8 h-8 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center mr-3">
                                                            <span class="text-white text-xs font-bold">#</span>
                                                        </div>
                                                        <span class="text-sm font-black text-gray-900">{{ $order->id }}</span>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-5 whitespace-nowrap text-sm font-semibold text-gray-600">
                                                    {{ $order->created_at->format('d/m/Y') }}
                                                </td>
                                                <td class="px-6 py-5 whitespace-nowrap text-sm font-black text-gray-900">
                                                    {{ number_format($order->total, 0, '', ' ') }}<span class="text-xs font-medium text-gray-600 ml-1">FCFA</span>
                                                </td>
                                                <td class="px-6 py-5 whitespace-nowrap">
                                                    <span class="px-4 py-2 inline-flex text-sm leading-5 font-bold rounded-full shadow-sm
                                                        @if($order->status === 'en_attente') bg-gradient-to-r from-yellow-100 to-yellow-200 text-yellow-800
                                                        @elseif($order->status === 'expediee') bg-gradient-to-r from-purple-100 to-purple-200 text-purple-800
                                                        @elseif($order->status === 'livree') bg-gradient-to-r from-green-100 to-green-200 text-green-800
                                                        @elseif($order->status === 'annulee') bg-gradient-to-r from-red-100 to-red-200 text-red-800
                                                        @else bg-gradient-to-r from-gray-100 to-gray-200 text-gray-800 @endif">
                                                        {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-5 whitespace-nowrap">
                                                    <span class="px-4 py-2 inline-flex text-sm leading-5 font-bold rounded-full shadow-sm
                                                        @if($order->payment_status === 'paye') bg-gradient-to-r from-green-100 to-emerald-200 text-green-800
                                                        @elseif($order->payment_status === 'en_attente') bg-gradient-to-r from-yellow-100 to-yellow-200 text-yellow-800
                                                        @else bg-gradient-to-r from-red-100 to-red-200 text-red-800 @endif">
                                                        {{ ucfirst($order->payment_status) }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-5 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                                    <a href="{{ route('order.history.show', $order) }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-100 to-blue-200 text-blue-700 font-bold rounded-lg hover:from-blue-200 hover:to-blue-300 transition-all duration-300 transform hover:scale-105">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                        </svg>
                                                        Voir
                                                    </a>
                                                    <a href="{{ route('order.invoice', $order) }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-green-100 to-emerald-200 text-green-700 font-bold rounded-lg hover:from-green-200 hover:to-emerald-300 transition-all duration-300 transform hover:scale-105">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                        </svg>
                                                        Facture
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Version Mobile -->
                            <div class="lg:hidden">
                                <div class="p-6 space-y-6">
                                    @foreach($orders as $order)
                                        <div class="bg-white p-6 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                                            <div class="flex items-center justify-between mb-4">
                                                <div class="flex items-center">
                                                    <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl flex items-center justify-center mr-3">
                                                        <span class="text-white text-sm font-bold">#</span>
                                                    </div>
                                                    <div>
                                                        <p class="text-lg font-black text-gray-900">#{{ $order->id }}</p>
                                                        <p class="text-sm text-gray-600">{{ $order->created_at->format('d/m/Y H:i') }}</p>
                                                    </div>
                                                </div>
                                                <div class="text-right">
                                                    <p class="text-lg font-black text-gray-900">{{ number_format($order->total, 0, '', ' ') }} <span class="text-sm text-gray-600">FCFA</span></p>
                                                </div>
                                            </div>

                                            <div class="grid grid-cols-2 gap-4 mb-4">
                                                <div>
                                                    <p class="text-xs font-bold text-gray-500 uppercase tracking-wide mb-1">Statut Commande</p>
                                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full
                                                    @if($order->status === 'en_attente') bg-gradient-to-r from-yellow-100 to-yellow-200 text-yellow-800
                                                    @elseif($order->status === 'expediee') bg-gradient-to-r from-purple-100 to-purple-200 text-purple-800
                                                    @elseif($order->status === 'livree') bg-gradient-to-r from-green-100 to-green-200 text-green-800
                                                    @elseif($order->status === 'annulee') bg-gradient-to-r from-red-100 to-red-200 text-red-800
                                                    @else bg-gradient-to-r from-gray-100 to-gray-200 text-gray-800 @endif">
                                                    {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                                                </span>
                                                </div>
                                                <div>
                                                    <p class="text-xs font-bold text-gray-500 uppercase tracking-wide mb-1">Paiement</p>
                                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-bold rounded-full
                                                    @if($order->payment_status === 'paye') bg-gradient-to-r from-green-100 to-emerald-200 text-green-800
                                                    @elseif($order->payment_status === 'en_attente') bg-gradient-to-r from-yellow-100 to-yellow-200 text-yellow-800
                                                    @else bg-gradient-to-r from-red-100 to-red-200 text-red-800 @endif">
                                                    {{ ucfirst($order->payment_status) }}
                                                </span>
                                                </div>
                                            </div>

                                            <div class="flex space-x-3">
                                                <a href="{{ route('order.history.show', $order) }}" class="flex-1 inline-flex items-center justify-center px-4 py-3 bg-gradient-to-r from-blue-100 to-blue-200 text-blue-700 font-bold rounded-xl hover:from-blue-200 hover:to-blue-300 transition-all duration-300">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                    Voir
                                                </a>
                                                <a href="{{ route('order.invoice', $order) }}" class="flex-1 inline-flex items-center justify-center px-4 py-3 bg-gradient-to-r from-green-100 to-emerald-200 text-green-700 font-bold rounded-xl hover:from-green-200 hover:to-emerald-300 transition-all duration-300">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                    </svg>
                                                    Facture
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Pagination -->
                            @if($orders->hasPages())
                                <div class="bg-gradient-to-r from-gray-50 to-white px-6 py-4 border-t border-gray-100 rounded-b-2xl">
                                    <div class="flex items-center justify-between">
                                        <div class="text-sm text-gray-600 font-medium">
                                            Affichage de {{ $orders->firstItem() }} à {{ $orders->lastItem() }} sur {{ $orders->total() }} commandes
                                        </div>
                                        <div class="pagination-wrapper">
                                            {{ $orders->links() }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @else
                            <!-- État vide -->
                            <div class="text-center py-20">
                                <div class="w-32 h-32 bg-gradient-to-r from-blue-100 to-purple-100 rounded-full flex items-center justify-center mx-auto mb-8">
                                    <svg class="h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-black text-gray-900 mb-4">Aucune commande trouvée</h3>
                                <p class="text-gray-600 mb-8 max-w-md mx-auto text-lg">Vous n'avez pas encore passé de commande. Découvrez notre collection premium et commencez votre expérience shopping dès maintenant.</p>
                                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                                    <a href="{{ route('shop.index') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <circle cx="9" cy="21" r="1"/>
                                            <circle cx="20" cy="21" r="1"/>
                                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                                        </svg>
                                        Découvrir nos produits
                                    </a>
                                    <a href="{{ route('client.dashboard') }}" class="inline-flex items-center px-8 py-4 border-2 border-gray-300 text-gray-700 font-bold rounded-xl hover:bg-gray-50 hover:border-gray-400 transition-all duration-300 transform hover:scale-105">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                                            <path d="M8 1v6"/>
                                        </svg>
                                        Retour au tableau de bord
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .pagination-wrapper .pagination {
            @apply flex items-center space-x-1;
        }

        .pagination-wrapper .page-link {
            @apply px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-blue-50 hover:text-blue-600 hover:border-blue-300 transition-all duration-200;
        }

        .pagination-wrapper .page-item.active .page-link {
            @apply bg-gradient-to-r from-blue-600 to-purple-600 text-white border-transparent shadow-lg;
        }

        .pagination-wrapper .page-item.disabled .page-link {
            @apply text-gray-400 cursor-not-allowed hover:bg-white hover:text-gray-400 hover:border-gray-300;
        }
    </style>
@endsection
