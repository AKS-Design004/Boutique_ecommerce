<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mot de passe oublié - BaabelShop</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <style>
        body { 
            font-family: 'Inter', sans-serif; 
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
            <p class="text-gray-600 mt-4 text-lg">Réinitialisez votre mot de passe</p>
        </div>
        
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="px-8 py-6">
                <h2 class="text-2xl font-bold text-center mb-6">Mot de passe oublié</h2>
                @if (session('status'))
                    <div class="mb-4 text-green-700 bg-green-100 rounded px-4 py-3 text-sm">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Adresse e-mail</label>
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M16 12H8m8 0V8a4 4 0 00-8 0v4m8 0v4a4 4 0 01-8 0v-4"/></svg>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="votre@email.com" class="pl-10 block w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 text-gray-900">
                        </div>
                        @error('email')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white py-3 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">Envoyer le lien de réinitialisation</button>
                </form>
                <div class="mt-6 text-center">
                    <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline transition-colors">← Retour à la connexion</a>
                </div>
            </div>
        </div>
        
        <div class="mt-8 text-center">
            <a href="/" class="text-sm text-gray-500 hover:text-blue-600 transition-colors">← Retour à l'accueil</a>
        </div>
    </div>
</body>
</html>
