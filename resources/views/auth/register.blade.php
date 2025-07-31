{{-- Nouvelle page register inspirée du design React fourni --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Inscription - BaabelShop</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <style>
        body { 
            font-family: 'Inter', sans-serif; 
        }
        .logo-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 to-purple-50 flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Logo avec style navbar -->
        <div class="text-center mb-8">
            <a href="/" class="inline-flex items-center space-x-4">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full blur opacity-75"></div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="relative h-12 w-12 text-white bg-gradient-to-r from-blue-600 to-purple-600 rounded-full p-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path d="M3 7V6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v1M3 7l1.553 9.32A2 2 0 0 0 6.53 18h10.94a2 2 0 0 0 1.978-1.68L21 7M3 7h18"/>
                    </svg>
                </div>
                <div>
                    <span class="text-3xl font-black bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">BaabelShop</span>
                    <div class="text-xs text-gray-500 font-medium">Votre boutique moderne</div>
                </div>
            </a>
            <p class="text-gray-600 mt-4 text-lg">Créez votre compte</p>
        </div>
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="px-8 py-6">
                <h2 class="text-2xl font-bold text-center mb-6">Inscription</h2>
                @if($errors->any())
                    <div class="mb-4 text-red-700 bg-red-100 rounded px-4 py-2 text-sm">
                        <ul class="list-disc pl-5">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('register') }}" class="space-y-4" id="registerForm">
            @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                            <div class="relative">
                                <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <input id="first_name" name="first_name" type="text" placeholder="Awa" value="{{ old('first_name') }}" class="pl-10 block w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 text-gray-900" required />
                            </div>
                        </div>
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                            <div class="relative">
                                <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <input id="last_name" name="last_name" type="text" placeholder="Ndiaye" value="{{ old('last_name') }}" class="pl-10 block w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 text-gray-900" required />
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M16 12H8m8 0V8a4 4 0 00-8 0v4m8 0v4a4 4 0 01-8 0v-4"/></svg>
                            <input id="email" name="email" type="email" placeholder="awa.ndiaye@exemple.sn" value="{{ old('email') }}" class="pl-10 block w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 text-gray-900" required />
                        </div>
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M3 5a2 2 0 012-2h2.28a2 2 0 011.7 1l.94 1.88a2 2 0 001.7 1H17a2 2 0 012 2v7a2 2 0 01-2 2H7a2 2 0 01-2-2V5z"/></svg>
                            <input id="phone" name="phone" type="tel" placeholder="77 123 45 67" value="{{ old('phone') }}" class="pl-10 block w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 text-gray-900" required />
                        </div>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 17v.01M17 13a5 5 0 00-10 0v4a2 2 0 002 2h6a2 2 0 002-2v-4z"/></svg>
                            <input id="password" name="password" type="password" placeholder="••••••••" class="pl-10 pr-10 block w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 text-gray-900" required />
                            <button type="button" id="togglePassword" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                            </button>
                        </div>
                    </div>
            <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmer le mot de passe</label>
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 17v.01M17 13a5 5 0 00-10 0v4a2 2 0 002 2h6a2 2 0 002-2v-4z"/></svg>
                            <input id="password_confirmation" name="password_confirmation" type="password" placeholder="••••••••" class="pl-10 pr-10 block w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 text-gray-900" required />
                            <button type="button" id="toggleConfirmPassword" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <svg id="eyeIconConfirm" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                            </button>
                        </div>
                    </div>
                    <div class="flex items-start space-x-2">
                        <input type="checkbox" class="mt-1 rounded border-gray-300" required id="cgu" />
                        <p class="text-sm text-gray-600">
                            J'accepte les conditions d'utilisation du site.
                        </p>
            </div>
                    <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">Créer mon compte</button>
                </form>
                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Déjà un compte ?
                        <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-medium">Se connecter</a>
                    </p>
            </div>
            </div>
        </div>
        <div class="mt-8 text-center">
            <a href="/" class="text-sm text-gray-500 hover:text-blue-600 transition-colors">← Retour à l'accueil</a>
            </div>
            </div>
    <script>
    // Afficher/masquer le mot de passe
    document.addEventListener('DOMContentLoaded', function() {
        const toggle = document.getElementById('togglePassword');
        const pwd = document.getElementById('password');
        const eye = document.getElementById('eyeIcon');
        if(toggle && pwd && eye) {
            toggle.addEventListener('click', function() {
                if(pwd.type === 'password') {
                    pwd.type = 'text';
                    eye.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.956 9.956 0 012.042-3.292m3.087-2.727A9.956 9.956 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.965 9.965 0 01-4.293 5.411M15 12a3 3 0 11-6 0 3 3 0 016 0z" />';
                } else {
                    pwd.type = 'password';
                    eye.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
                }
            });
        }
        // Pour la confirmation
        const toggleConfirm = document.getElementById('toggleConfirmPassword');
        const pwdConfirm = document.getElementById('password_confirmation');
        const eyeConfirm = document.getElementById('eyeIconConfirm');
        if(toggleConfirm && pwdConfirm && eyeConfirm) {
            toggleConfirm.addEventListener('click', function() {
                if(pwdConfirm.type === 'password') {
                    pwdConfirm.type = 'text';
                    eyeConfirm.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.956 9.956 0 012.042-3.292m3.087-2.727A9.956 9.956 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.965 9.965 0 01-4.293 5.411M15 12a3 3 0 11-6 0 3 3 0 016 0z" />';
                } else {
                    pwdConfirm.type = 'password';
                    eyeConfirm.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
                }
            });
        }
    });
    </script>
</body>
</html>
