@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-blue-50 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-3xl border border-gray-100">
                <div class="p-8 bg-gradient-to-r from-white to-blue-50/30">
                    <!-- En-tête avec titre et avatar -->
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h2 class="text-4xl font-black bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-2">
                                Tableau de bord
                            </h2>
                            <p class="text-gray-600 text-lg">Bienvenue dans votre espace personnel, {{ $user->name }}</p>
                        </div>
                        <div class="w-16 h-16 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-xl shadow-lg">
                            {{ substr($user->name, 0, 1) }}
                        </div>
                    </div>

                    <!-- Statistiques avec design moderne -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-2xl border border-blue-200 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                            <div class="flex items-center">
                                <div class="p-4 bg-gradient-to-r from-blue-600 to-blue-700 rounded-xl shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                    </svg>
                                </div>
                                <div class="ml-6">
                                    <p class="text-sm font-semibold text-blue-700 uppercase tracking-wide">Total Commandes</p>
                                    <p class="text-3xl font-black text-blue-900">{{ $totalOrders }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gradient-to-br from-green-50 to-emerald-100 p-8 rounded-2xl border border-green-200 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                            <div class="flex items-center">
                                <div class="p-4 bg-gradient-to-r from-green-600 to-emerald-600 rounded-xl shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                </div>
                                <div class="ml-6">
                                    <p class="text-sm font-semibold text-green-700 uppercase tracking-wide">Total Dépensé</p>
                                    <p class="text-2xl font-black text-green-900">{{ number_format($totalSpent, 0, '', ' ') }}<span class="text-lg font-medium"> FCFA</span></p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gradient-to-br from-purple-50 to-violet-100 p-8 rounded-2xl border border-purple-200 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                            <div class="flex items-center">
                                <div class="p-4 bg-gradient-to-r from-purple-600 to-violet-600 rounded-xl shadow-lg">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <div class="ml-6">
                                    <p class="text-sm font-semibold text-purple-700 uppercase tracking-wide">Membre depuis</p>
                                    <p class="text-xl font-black text-purple-900">{{ $user->created_at->format('M Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Commandes récentes avec design moderne -->
                    <div class="bg-gradient-to-br from-gray-50 to-white p-8 rounded-2xl shadow-lg border border-gray-100">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-2xl font-bold text-gray-900">Commandes récentes</h3>
                            <a href="{{ route('order.history') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                                Voir toutes
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                        </div>

                        @if($recentOrders->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full">
                                    <thead>
                                    <tr class="bg-gradient-to-r from-gray-100 to-gray-50">
                                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider rounded-tl-xl">N° Commande</th>
                                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">Date</th>
                                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">Montant</th>
                                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider">Statut</th>
                                        <th class="px-6 py-4 text-left text-sm font-bold text-gray-700 uppercase tracking-wider rounded-tr-xl">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-100">
                                    @foreach($recentOrders as $order)
                                        <tr class="hover:bg-blue-50/50 transition-colors duration-200">
                                            <td class="px-6 py-5 whitespace-nowrap text-sm font-bold text-gray-900">
                                                #{{ $order->id }}
                                            </td>
                                            <td class="px-6 py-5 whitespace-nowrap text-sm text-gray-600 font-medium">
                                                {{ $order->created_at->format('d/m/Y H:i') }}
                                            </td>
                                            <td class="px-6 py-5 whitespace-nowrap text-sm font-bold text-gray-900">
                                                {{ number_format($order->total, 0, '', ' ') }} FCFA
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
                                            <td class="px-6 py-5 whitespace-nowrap text-sm font-medium space-x-2">
                                                <a href="{{ route('order.history.show', $order) }}" class="inline-flex items-center px-3 py-2 bg-blue-100 text-blue-700 font-semibold rounded-lg hover:bg-blue-200 transition-colors duration-200">
                                                    Voir
                                                </a>
                                                <a href="{{ route('order.invoice', $order) }}" class="inline-flex items-center px-3 py-2 bg-green-100 text-green-700 font-semibold rounded-lg hover:bg-green-200 transition-colors duration-200">
                                                    Facture
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center py-16">
                                <div class="w-24 h-24 bg-gradient-to-r from-blue-100 to-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Aucune commande</h3>
                                <p class="text-gray-600 mb-8 max-w-md mx-auto">Vous n'avez pas encore passé de commande. Découvrez notre collection premium et commencez votre expérience shopping.</p>
                                <a href="{{ route('shop.index') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <circle cx="9" cy="21" r="1"/>
                                        <circle cx="20" cy="21" r="1"/>
                                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                                    </svg>
                                    Commencer à acheter
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Actions rapides avec design moderne -->
                    <div class="mt-12 grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl flex items-center justify-center mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900">Actions rapides</h3>
                            </div>
                            <div class="space-y-4">
                                <a href="{{ route('shop.index') }}" class="flex items-center p-4 text-gray-700 hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 rounded-xl transition-all duration-300 border border-transparent hover:border-blue-200 group">
                                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4 group-hover:bg-blue-200 transition-colors duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <circle cx="9" cy="21" r="1"/>
                                            <circle cx="20" cy="21" r="1"/>
                                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Continuer mes achats</p>
                                        <p class="text-sm text-gray-600">Découvrez notre collection premium</p>
                                    </div>
                                </a>
                                <a href="{{ route('order.history') }}" class="flex items-center p-4 text-gray-700 hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 rounded-xl transition-all duration-300 border border-transparent hover:border-green-200 group">
                                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mr-4 group-hover:bg-green-200 transition-colors duration-300">
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Voir mes commandes</p>
                                        <p class="text-sm text-gray-600">Historique complet de vos achats</p>
                                    </div>
                                </a>
                                <a href="{{ route('client.profile') }}" class="flex items-center p-4 text-gray-700 hover:bg-gradient-to-r hover:from-purple-50 hover:to-violet-50 rounded-xl transition-all duration-300 border border-transparent hover:border-purple-200 group">
                                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-4 group-hover:bg-purple-200 transition-colors duration-300">
                                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Modifier mon profil</p>
                                        <p class="text-sm text-gray-600">Gérez vos informations personnelles</p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 bg-gradient-to-r from-green-600 to-emerald-600 rounded-xl flex items-center justify-center mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900">Informations personnelles</h3>
                            </div>
                            <div class="space-y-4">
                                <div class="flex justify-between items-center p-4 bg-gray-50 rounded-xl">
                                    <span class="text-gray-600 font-medium">Nom :</span>
                                    <span class="font-bold text-gray-900">{{ $user->name }}</span>
                                </div>
                                <div class="flex justify-between items-center p-4 bg-gray-50 rounded-xl">
                                    <span class="text-gray-600 font-medium">Email :</span>
                                    <span class="font-bold text-gray-900">{{ $user->email }}</span>
                                </div>
                                @if($user->phone)
                                    <div class="flex justify-between items-center p-4 bg-gray-50 rounded-xl">
                                        <span class="text-gray-600 font-medium">Téléphone :</span>
                                        <span class="font-bold text-gray-900">{{ $user->phone }}</span>
                                    </div>
                                @endif
                                @if($user->address)
                                    <div class="flex justify-between items-center p-4 bg-gray-50 rounded-xl">
                                        <span class="text-gray-600 font-medium">Adresse :</span>
                                        <span class="font-bold text-gray-900">{{ Str::limit($user->address, 30) }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="mt-6">
                                <a href="{{ route('client.profile') }}" class="w-full inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-gray-800 to-gray-900 text-white font-semibold rounded-xl hover:from-blue-600 hover:to-purple-600 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Modifier les informations
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
