@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-blue-50 py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-3xl border border-gray-100">
                <div class="p-8 bg-gradient-to-r from-white to-blue-50/30">
                    <!-- En-tête avec titre et navigation -->
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h2 class="text-4xl font-black bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-2">
                                Mon Profil
                            </h2>
                            <p class="text-gray-600 text-lg">Gérez vos informations personnelles</p>
                        </div>
                        <a href="{{ route('client.dashboard') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-700 to-gray-800 text-white font-semibold rounded-xl hover:shadow-lg transition-all duration-300 transform hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M15 19l-7-7 7-7"/>
                            </svg>
                            Retour au tableau de bord
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="mb-8 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-400 p-6 rounded-2xl shadow-lg">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-green-800 font-semibold">{{ session('success') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('client.profile.update') }}" class="space-y-8">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Informations personnelles -->
                            <div class="bg-gradient-to-br from-blue-50 to-blue-100/50 p-8 rounded-2xl border border-blue-200 shadow-lg">
                                <div class="flex items-center mb-6">
                                    <div class="w-12 h-12 bg-gradient-to-r from-blue-600 to-blue-700 rounded-xl flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-xl font-bold text-blue-900">Informations personnelles</h3>
                                </div>

                                <div class="space-y-6">
                                    <div>
                                        <label for="name" class="block text-sm font-bold text-blue-800 mb-2 uppercase tracking-wide">
                                            Nom complet *
                                        </label>
                                        <input type="text"
                                               id="name"
                                               name="name"
                                               value="{{ old('name', $user->name) }}"
                                               class="w-full px-4 py-3 border-2 border-blue-200 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white/70 backdrop-blur-sm font-medium @error('name') border-red-400 @enderror transition-all duration-300"
                                               required>
                                        @error('name')
                                        <p class="mt-2 text-sm text-red-600 font-semibold">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="email" class="block text-sm font-bold text-blue-800 mb-2 uppercase tracking-wide">
                                            Adresse email *
                                        </label>
                                        <input type="email"
                                               id="email"
                                               name="email"
                                               value="{{ old('email', $user->email) }}"
                                               class="w-full px-4 py-3 border-2 border-blue-200 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white/70 backdrop-blur-sm font-medium @error('email') border-red-400 @enderror transition-all duration-300"
                                               required>
                                        @error('email')
                                        <p class="mt-2 text-sm text-red-600 font-semibold">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="phone" class="block text-sm font-bold text-blue-800 mb-2 uppercase tracking-wide">
                                            Numéro de téléphone
                                        </label>
                                        <input type="tel"
                                               id="phone"
                                               name="phone"
                                               value="{{ old('phone', $user->phone) }}"
                                               class="w-full px-4 py-3 border-2 border-blue-200 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white/70 backdrop-blur-sm font-medium @error('phone') border-red-400 @enderror transition-all duration-300"
                                               placeholder="+33 6 12 34 56 78">
                                        @error('phone')
                                        <p class="mt-2 text-sm text-red-600 font-semibold">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Adresse de livraison -->
                            <div class="bg-gradient-to-br from-purple-50 to-violet-100/50 p-8 rounded-2xl border border-purple-200 shadow-lg">
                                <div class="flex items-center mb-6">
                                    <div class="w-12 h-12 bg-gradient-to-r from-purple-600 to-violet-600 rounded-xl flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-xl font-bold text-purple-900">Adresse de livraison</h3>
                                </div>

                                <div>
                                    <label for="address" class="block text-sm font-bold text-purple-800 mb-2 uppercase tracking-wide">
                                        Adresse complète
                                    </label>
                                    <textarea id="address"
                                              name="address"
                                              rows="6"
                                              class="w-full px-4 py-3 border-2 border-purple-200 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 bg-white/70 backdrop-blur-sm font-medium @error('address') border-red-400 @enderror transition-all duration-300 resize-none"
                                              placeholder="123 Rue de la Paix&#10;75001 Paris, France">{{ old('address', $user->address) }}</textarea>
                                    @error('address')
                                    <p class="mt-2 text-sm text-red-600 font-semibold">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mt-6 bg-gradient-to-r from-purple-100 to-violet-100 p-6 rounded-xl border border-purple-200">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <h4 class="text-sm font-bold text-purple-800 mb-2">
                                                Informations importantes
                                            </h4>
                                            <div class="text-sm text-purple-700 space-y-1 font-medium">
                                                <p>• Votre adresse sera utilisée pour la livraison de vos commandes</p>
                                                <p>• Assurez-vous que les informations sont exactes</p>
                                                <p>• Vous pouvez modifier ces informations à tout moment</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Informations du compte -->
                        <div class="bg-gradient-to-br from-gray-50 to-white p-8 rounded-2xl shadow-lg border border-gray-100">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 bg-gradient-to-r from-gray-700 to-gray-800 rounded-xl flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900">Informations du compte</h3>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                                    <div class="flex items-center">
                                        <div class="p-3 bg-green-100 rounded-lg mr-4">
                                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 9l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <span class="text-sm font-bold text-gray-500 uppercase tracking-wide">Membre depuis</span>
                                            <p class="text-lg font-black text-gray-900">{{ $user->created_at->format('d/m/Y') }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                                    <div class="flex items-center">
                                        <div class="p-3 bg-blue-100 rounded-lg mr-4">
                                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <span class="text-sm font-bold text-gray-500 uppercase tracking-wide">Dernière connexion</span>
                                            <p class="text-lg font-black text-gray-900">{{ $user->updated_at->format('d/m/Y H:i') }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                                    <div class="flex items-center">
                                        <div class="p-3 bg-green-100 rounded-lg mr-4">
                                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <span class="text-sm font-bold text-gray-500 uppercase tracking-wide">Statut du compte</span>
                                            <p class="text-sm font-black text-gray-900">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 border border-green-200">
                                                ✓ Actif
                                            </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Boutons d'action -->
                        <div class="flex flex-col sm:flex-row justify-end space-y-4 sm:space-y-0 sm:space-x-6 pt-8 border-t-2 border-gray-100">
                            <a href="{{ route('client.dashboard') }}"
                               class="inline-flex items-center justify-center px-8 py-4 border-2 border-gray-300 rounded-xl shadow-lg text-base font-bold text-gray-700 bg-white hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-300 transform hover:scale-105">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Annuler
                            </a>
                            <button type="submit"
                                    class="inline-flex items-center justify-center px-8 py-4 border-2 border-transparent rounded-xl shadow-lg text-base font-bold text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path d="M5 13l4 4L19 7"/>
                                </svg>
                                Enregistrer les modifications
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
