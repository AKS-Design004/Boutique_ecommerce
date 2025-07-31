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
                                Créer un nouvel utilisateur
                            </h1>
                            <p class="text-gray-600 text-lg">Ajoutez un nouveau client ou administrateur</p>
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

                    <!-- Formulaire -->
                    <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg border border-gray-100 p-6">
                        <form action="{{ route('admin.users.store') }}" method="POST">
                            @csrf

                            <!-- Nom et Email -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <!-- Nom -->
                                <div>
                                    <label for="name" class="block text-sm font-bold text-gray-700 uppercase tracking-wide mb-2">Nom complet</label>
                                    <input type="text"
                                           name="name"
                                           id="name"
                                           value="{{ old('name') }}"
                                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-gray-900 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:shadow-md bg-white/50"
                                           placeholder="Nom et prénom"
                                           required>
                                    @error('name')
                                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div>
                                    <label for="email" class="block text-sm font-bold text-gray-700 uppercase tracking-wide mb-2">Adresse email</label>
                                    <input type="email"
                                           name="email"
                                           id="email"
                                           value="{{ old('email') }}"
                                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-gray-900 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:shadow-md bg-white/50"
                                           placeholder="exemple@email.com"
                                           required>
                                    @error('email')
                                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Mot de passe et Confirmation -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <!-- Mot de passe -->
                                <div>
                                    <label for="password" class="block text-sm font-bold text-gray-700 uppercase tracking-wide mb-2">Mot de passe</label>
                                    <input type="password"
                                           name="password"
                                           id="password"
                                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-gray-900 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:shadow-md bg-white/50"
                                           placeholder="Minimum 8 caractères"
                                           required>
                                    @error('password')
                                    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Confirmation mot de passe -->
                                <div>
                                    <label for="password_confirmation" class="block text-sm font-bold text-gray-700 uppercase tracking-wide mb-2">Confirmer le mot de passe</label>
                                    <input type="password"
                                           name="password_confirmation"
                                           id="password_confirmation"
                                           class="w-full border border-gray-200 rounded-xl px-4 py-3 text-gray-900 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:shadow-md bg-white/50"
                                           placeholder="Répétez le mot de passe"
                                           required>
                                </div>
                            </div>

                            <!-- Rôle -->
                            <div class="mb-8">
                                <label class="block text-sm font-bold text-gray-700 uppercase tracking-wide mb-4">Rôle de l'utilisateur</label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <label class="relative flex cursor-pointer rounded-2xl border border-gray-200 bg-white/50 p-4 shadow-sm focus:outline-none hover:shadow-md transition-all duration-300 {{ old('role') === 'client' ? 'border-purple-500' : '' }}">
                                        <input type="radio" name="role" value="client" class="sr-only" {{ old('role') === 'client' ? 'checked' : '' }}>
                                        <span class="flex flex-1">
                                            <span class="flex flex-col">
                                                <span class="block text-sm font-bold text-gray-900">Client</span>
                                                <span class="mt-1 flex items-center text-sm text-gray-600">
                                                    <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                                                    </svg>
                                                    Accès aux achats et commandes
                                                </span>
                                            </span>
                                        </span>
                                        <svg class="h-5 w-5 text-purple-500 {{ old('role') === 'client' ? 'opacity-100' : 'opacity-0' }}" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                    </label>

                                    <label class="relative flex cursor-pointer rounded-2xl border border-gray-200 bg-white/50 p-4 shadow-sm focus:outline-none hover:shadow-md transition-all duration-300 {{ old('role') === 'admin' ? 'border-purple-500' : '' }}">
                                        <input type="radio" name="role" value="admin" class="sr-only" {{ old('role') === 'admin' ? 'checked' : '' }}>
                                        <span class="flex flex-1">
                                            <span class="flex flex-col">
                                                <span class="block text-sm font-bold text-gray-900">Administrateur</span>
                                                <span class="mt-1 flex items-center text-sm text-gray-600">
                                                    <svg class="w-4 h-4 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                                    </svg>
                                                    Accès complet à l'administration
                                                </span>
                                            </span>
                                        </span>
                                        <svg class="h-5 w-5 text-purple-500 {{ old('role') === 'admin' ? 'opacity-100' : 'opacity-0' }}" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                    </label>
                                </div>
                                @error('role')
                                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Boutons d'action -->
                            <div class="flex items-center justify-end space-x-4">
                                <a href="{{ route('admin.users.index') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-200 to-gray-300 text-gray-700 font-bold rounded-2xl hover:from-gray-300 hover:to-gray-400 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                    Annuler
                                </a>
                                <button type="submit" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold rounded-2xl hover:from-purple-600 hover:to-pink-600 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    Créer l'utilisateur
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Gestion des boutons radio personnalisés
        document.querySelectorAll('input[name="role"]').forEach(radio => {
            radio.addEventListener('change', function() {
                document.querySelectorAll('input[name="role"]').forEach(r => {
                    r.closest('label').classList.remove('border-purple-500');
                    r.closest('label').querySelector('svg:last-child').classList.add('opacity-0');
                });
                this.closest('label').classList.add('border-purple-500');
                this.closest('label').querySelector('svg:last-child').classList.remove('opacity-0');
            });
        });
    </script>
@endsection
