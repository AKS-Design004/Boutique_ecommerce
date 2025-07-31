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
                                Détails de l'utilisateur
                            </h1>
                            <p class="text-gray-600 text-lg">Informations complètes sur {{ $user->name }}</p>
                        </div>
                        <a href="{{ route('admin.users.index') }}" class="group inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-200 to-gray-300 text-gray-700 font-bold rounded-2xl hover:from-gray-300 hover:to-gray-400 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                            Retour aux utilisateurs
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

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <!-- Informations utilisateur -->
                        <div class="lg:col-span-1">
                            <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg border border-gray-100 p-8">
                                <div class="text-center mb-6">
                                    <div class="w-24 h-24 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white font-bold text-3xl mx-auto mb-4 shadow-md">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    <h2 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h2>
                                    <p class="text-gray-600">{{ $user->email }}</p>
                                </div>

                                <div class="space-y-4">
                                    <div class="flex items-center justify-between p-4 bg-white/50 rounded-2xl border border-gray-100 hover:shadow-md transition-all duration-300">
                                        <span class="text-sm font-bold text-gray-600">Rôle</span>
                                        <span class="inline-flex items-center px-3 py-1 rounded-xl text-sm font-bold {{
                                            $user->role === 'admin' ? 'bg-gradient-to-r from-red-100 to-pink-100 text-red-800' : 'bg-gradient-to-r from-green-100 to-emerald-100 text-green-800'
                                        }}">
                                            @if($user->role === 'admin')
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                                </svg>
                                            @else
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                                                </svg>
                                            @endif
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </div>

                                    <div class="flex items-center justify-between p-4 bg-white/50 rounded-2xl border border-gray-100 hover:shadow-md transition-all duration-300">
                                        <span class="text-sm font-bold text-gray-600">Inscription</span>
                                        <span class="text-sm text-gray-900">{{ $user->created_at->format('d/m/Y H:i') }}</span>
                                    </div>

                                    <div class="flex items-center justify-between p-4 bg-white/50 rounded-2xl border border-gray-100 hover:shadow-md transition-all duration-300">
                                        <span class="text-sm font-bold text-gray-600">ID</span>
                                        <span class="text-sm text-gray-900">#{{ $user->id }}</span>
                                    </div>

                                    @if($user->phone)
                                        <div class="flex items-center justify-between p-4 bg-white/50 rounded-2xl border border-gray-100 hover:shadow-md transition-all duration-300">
                                            <span class="text-sm font-bold text-gray-600">Téléphone</span>
                                            <span class="text-sm text-gray-900">{{ $user->phone }}</span>
                                        </div>
                                    @endif

                                    @if($user->address)
                                        <div class="flex items-center justify-between p-4 bg-white/50 rounded-2xl border border-gray-100 hover:shadow-md transition-all duration-300">
                                            <span class="text-sm font-bold text-gray-600">Adresse</span>
                                            <span class="text-sm text-gray-900">{{ $user->address }}</span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Boutons d'action -->
                                <div class="mt-8 space-y-3">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="w-full flex items-center justify-center px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold rounded-2xl hover:from-purple-600 hover:to-pink-600 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Modifier
                                    </a>
                                    <a href="{{ route('admin.users.index') }}" class="w-full flex items-center justify-center px-6 py-3 bg-gradient-to-r from-gray-200 to-gray-300 text-gray-700 font-bold rounded-2xl hover:from-gray-300 hover:to-gray-400 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                        </svg>
                                        Retour
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Historique des commandes -->
                        <div class="lg:col-span-2">
                            @if($user->role === 'client')
                                <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg border border-gray-100 p-8">
                                    <div class="flex items-center justify-between mb-6">
                                        <div class="flex items-center">
                                            <div class="w-12 h-12 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl flex items-center justify-center mr-4">
                                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3V3zm2 2v14h14V5H5zm2 2h10v10H7V7zm2 2v6h6V9H9z"/>
                                                </svg>
                                            </div>
                                            <h2 class="text-xl font-black text-gray-900">Historique des commandes</h2>
                                        </div>
                                        <span class="px-3 py-1 bg-gradient-to-r from-purple-100 to-pink-100 text-purple-800 rounded-xl text-sm font-bold">
                                            {{ $user->orders->count() }} commande(s)
                                        </span>
                                    </div>

                                    @if($user->orders->count())
                                        <div class="overflow-x-auto">
                                            <table class="min-w-full">
                                                <thead>
                                                <tr class="bg-gradient-to-r from-gray-100 to-purple-50/50">
                                                    <th class="py-4 px-6 text-left">
                                                        <span class="text-sm font-black text-gray-700 uppercase tracking-wide">#</span>
                                                    </th>
                                                    <th class="py-4 px-6 text-left">
                                                        <span class="text-sm font-black text-gray-700 uppercase tracking-wide">Date</span>
                                                    </th>
                                                    <th class="py-4 px-6 text-left">
                                                        <span class="text-sm font-black text-gray-700 uppercase tracking-wide">Total</span>
                                                    </th>
                                                    <th class="py-4 px-6 text-left">
                                                        <span class="text-sm font-black text-gray-700 uppercase tracking-wide">Statut</span>
                                                    </th>
                                                    <th class="py-4 px-6 text-left">
                                                        <span class="text-sm font-black text-gray-700 uppercase tracking-wide">Paiement</span>
                                                    </th>
                                                    <th class="py-4 px-6 text-right">
                                                        <span class="text-sm font-black text-gray-700 uppercase tracking-wide">Actions</span>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-100">
                                                @foreach($user->orders as $order)
                                                    <tr class="hover:bg-gradient-to-r hover:from-purple-50/30 hover:to-pink-50/30 transition-all duration-300 group">
                                                        <td class="py-6 px-6">
                                                            <span class="text-sm font-medium text-gray-900 group-hover:text-purple-600 transition-colors duration-300">#{{ $order->id }}</span>
                                                        </td>
                                                        <td class="py-6 px-6">
                                                            <span class="text-sm text-gray-600 font-medium">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                                                        </td>
                                                        <td class="py-6 px-6">
                                                            <span class="text-sm font-bold text-gray-900">{{ number_format($order->total, 0, '', ' ') }} FCFA</span>
                                                        </td>
                                                        <td class="py-6 px-6">
                                                                <span class="inline-flex items-center px-3 py-1 rounded-xl text-sm font-bold {{
                                                                    $order->status === 'en_attente' ? 'bg-gradient-to-r from-yellow-100 to-orange-100 text-yellow-800' :
                                                                    ($order->status === 'expediee' ? 'bg-gradient-to-r from-blue-100 to-cyan-100 text-blue-800' :
                                                                    ($order->status === 'livree' ? 'bg-gradient-to-r from-green-100 to-emerald-100 text-green-800' : 'bg-gradient-to-r from-red-100 to-pink-100 text-red-800'))
                                                                }}">
                                                                    {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                                                                </span>
                                                        </td>
                                                        <td class="py-6 px-6">
                                                                <span class="inline-flex items-center px-3 py-1 rounded-xl text-sm font-bold {{
                                                                    $order->payment_status === 'paye' ? 'bg-gradient-to-r from-green-100 to-emerald-100 text-green-800' : 'bg-gradient-to-r from-red-100 to-pink-100 text-red-800'
                                                                }}">
                                                                    {{ ucfirst($order->payment_status) }}
                                                                </span>
                                                        </td>
                                                        <td class="py-6 px-6 text-right">
                                                            <a href="{{ route('admin.orders.show', $order) }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-100 to-cyan-200 text-blue-700 font-bold rounded-xl hover:from-blue-200 hover:to-cyan-300 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                                </svg>
                                                                Voir
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <div class="text-center py-12">
                                            <div class="w-24 h-24 bg-gradient-to-r from-gray-100 to-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                                <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                                </svg>
                                            </div>
                                            <h3 class="text-xl font-black text-gray-900 mb-2">Aucune commande</h3>
                                            <p class="text-gray-600">Cet utilisateur n'a pas encore passé de commande.</p>
                                        </div>
                                    @endif
                                </div>
                            @else
                                <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg border border-gray-100 p-8">
                                    <div class="text-center py-12">
                                        <div class="w-24 h-24 bg-gradient-to-r from-gray-100 to-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                            <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                                            </svg>
                                        </div>
                                        <h3 class="text-xl font-black text-gray-900 mb-2">Administrateur</h3>
                                        <p class="text-gray-600">Les administrateurs n'ont pas d'historique de commandes.</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
