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
                                Gestion des commandes
                            </h1>
                            <p class="text-gray-600 text-lg">Suivez et gérez les commandes de votre boutique</p>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center space-x-2">
                                <div class="w-3 h-3 bg-purple-500 rounded-full animate-pulse"></div>
                                <span class="text-sm font-medium text-gray-600">{{ $orders->total() ?? 0 }} commandes</span>
                            </div>
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

                    <!-- Tableau des commandes -->
                    <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                        <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-white to-purple-50/30">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3V3zm2 2v14h14V5H5zm2 2h10v10H7V7zm2 2v6h6V9H9z"/>
                                    </svg>
                                </div>
                                <h2 class="text-2xl font-black text-gray-900">Liste des commandes</h2>
                            </div>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="min-w-full">
                                <thead>
                                <tr class="bg-gradient-to-r from-gray-100 to-purple-50/50">
                                    <th class="py-4 px-6 text-left">
                                        <span class="text-sm font-black text-gray-700 uppercase tracking-wide">#</span>
                                    </th>
                                    <th class="py-4 px-6 text-left">
                                        <span class="text-sm font-black text-gray-700 uppercase tracking-wide">Client</span>
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
                                    <th class="py-4 px-6 text-left">
                                        <span class="text-sm font-black text-gray-700 uppercase tracking-wide">Date</span>
                                    </th>
                                    <th class="py-4 px-6 text-right">
                                        <span class="text-sm font-black text-gray-700 uppercase tracking-wide">Actions</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                @forelse($orders as $order)
                                    <tr class="hover:bg-gradient-to-r hover:from-purple-50/30 hover:to-pink-50/30 transition-all duration-300 group">
                                        <td class="py-6 px-6">
                                            <span class="font-black text-gray-900 text-lg group-hover:text-purple-600 transition-colors duration-300">{{ $order->id }}</span>
                                        </td>
                                        <td class="py-6 px-6">
                                            <div class="flex items-center">
                                                <div class="w-3 h-3 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mr-3 group-hover:scale-125 transition-transform duration-300"></div>
                                                <span class="text-gray-600 font-medium">{{ $order->user->name ?? '-' }}</span>
                                            </div>
                                        </td>
                                        <td class="py-6 px-6">
                                            <span class="text-gray-600 font-medium">{{ number_format($order->total, 0, '', ' ') }} FCFA</span>
                                        </td>
                                        <td class="py-6 px-6">
                                                <span class="px-3 py-1 rounded-xl text-sm font-bold {{
                                                    $order->status === 'en_attente' ? 'bg-gradient-to-r from-yellow-100 to-orange-100 text-yellow-800' :
                                                    ($order->status === 'expediee' ? 'bg-gradient-to-r from-blue-100 to-cyan-100 text-blue-800' :
                                                    ($order->status === 'livree' ? 'bg-gradient-to-r from-green-100 to-emerald-100 text-green-800' : 'bg-gradient-to-r from-red-100 to-pink-100 text-red-800'))
                                                }}">
                                                    {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                                                </span>
                                        </td>
                                        <td class="py-6 px-6">
                                                <span class="px-3 py-1 rounded-xl text-sm font-bold {{
                                                    $order->payment_status === 'paye' ? 'bg-gradient-to-r from-green-100 to-emerald-100 text-green-800' : 'bg-gradient-to-r from-gray-100 to-gray-200 text-gray-800'
                                                }}">
                                                    {{ ucfirst($order->payment_status) }}
                                                </span>
                                        </td>
                                        <td class="py-6 px-6">
                                            <span class="text-gray-600 font-medium">{{ $order->created_at->format('d/m/Y H:i') }}</span>
                                        </td>
                                        <td class="py-6 px-6 text-right">
                                            <div class="flex items-center justify-end space-x-2">
                                                <a href="{{ route('admin.orders.show', $order) }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-100 to-cyan-200 text-blue-700 font-bold rounded-xl hover:from-blue-200 hover:to-cyan-300 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                    </svg>
                                                    Voir
                                                </a>
                                                <a href="{{ route('admin.orders.edit', $order) }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-yellow-100 to-orange-200 text-yellow-700 font-bold rounded-xl hover:from-yellow-200 hover:to-orange-300 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                    </svg>
                                                    Éditer
                                                </a>
                                                <form action="{{ route('admin.orders.destroy', $order) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?')">
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
                                        <td colspan="7" class="py-16">
                                            <div class="text-center">
                                                <div class="w-24 h-24 bg-gradient-to-r from-gray-100 to-purple-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                                    <svg class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3V3zm2 2v14h14V5H5zm2 2h10v10H7V7zm2 2v6h6V9H9z"/>
                                                    </svg>
                                                </div>
                                                <h3 class="text-xl font-black text-gray-900 mb-2">Aucune commande trouvée</h3>
                                                <p class="text-gray-600 mb-6">Aucune commande n'a été passée pour le moment.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        @if($orders->hasPages())
                            <div class="p-6 border-t border-gray-100 bg-gradient-to-r from-white to-purple-50/30">
                                <div class="flex items-center justify-between">
                                    <div class="text-sm text-gray-600 font-medium">
                                        Affichage de {{ $orders->firstItem() }} à {{ $orders->lastItem() }} sur {{ $orders->total() }} résultats
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        {{ $orders->links('pagination::tailwind') }}
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
                                <p class="text-sm font-bold text-purple-700 uppercase tracking-wide mb-1">Total commandes</p>
                                <p class="text-2xl font-black text-gray-900">{{ $orders->total() ?? 0 }}</p>
                            </div>
                        </div>
                        <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl shadow-lg border border-blue-100 p-6 hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-blue-700 uppercase tracking-wide mb-1">Commandes payées</p>
                                <p class="text-2xl font-black text-gray-900">{{ $orders->where('payment_status', 'paye')->count() }}</p>
                            </div>
                        </div>
                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl shadow-lg border border-green-100 p-6 hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-500 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-green-700 uppercase tracking-wide mb-1">Commandes livrées</p>
                                <p class="text-2xl font-black text-gray-900">{{ $orders->where('status', 'livree')->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
