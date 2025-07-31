@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-blue-50 py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-2xl sm:rounded-3xl border border-gray-100">
                <div class="p-8 bg-gradient-to-r from-white to-blue-50/30">

                    <!-- Animation de succès -->
                    <div class="text-center mb-12">
                        <div class="relative inline-block">
                            <!-- Cercles d'animation en arrière-plan -->
                            <div class="absolute inset-0 rounded-full bg-gradient-to-r from-green-400 to-emerald-500 opacity-20 animate-pulse scale-110"></div>
                            <div class="absolute inset-0 rounded-full bg-gradient-to-r from-green-400 to-emerald-500 opacity-10 animate-ping scale-125"></div>

                            <!-- Icône principale -->
                            <div class="relative w-32 h-32 bg-gradient-to-r from-green-500 to-emerald-600 rounded-full flex items-center justify-center shadow-2xl">
                                <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Message principal -->
                    <div class="text-center mb-12">
                        <h1 class="text-5xl font-black bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent mb-6">
                            Commande confirmée !
                        </h1>
                        <p class="text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                            Félicitations ! Votre commande a été enregistrée avec succès.
                            Nous nous occupons de tout et vous tiendrons informé à chaque étape.
                        </p>
                    </div>

                    <!-- Carte d'informations -->
                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl shadow-lg border border-green-100 p-8 mb-12">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                            <!-- Prochaines étapes -->
                            <div>
                                <div class="flex items-center mb-6">
                                    <div class="w-12 h-12 bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-2xl font-black text-gray-900">Prochaines étapes</h3>
                                </div>

                                <div class="space-y-4">
                                    <div class="flex items-start">
                                        <div class="w-6 h-6 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full flex items-center justify-center mr-4 mt-1">
                                            <span class="text-white text-xs font-bold">1</span>
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-900">Email de confirmation</p>
                                            <p class="text-sm text-gray-600">Vous recevrez un email détaillé dans quelques minutes</p>
                                        </div>
                                    </div>

                                    <div class="flex items-start">
                                        <div class="w-6 h-6 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center mr-4 mt-1">
                                            <span class="text-white text-xs font-bold">2</span>
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-900">Préparation</p>
                                            <p class="text-sm text-gray-600">Notre équipe prépare votre commande avec soin</p>
                                        </div>
                                    </div>

                                    <div class="flex items-start">
                                        <div class="w-6 h-6 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mr-4 mt-1">
                                            <span class="text-white text-xs font-bold">3</span>
                                        </div>
                                        <div>
                                            <p class="font-bold text-gray-900">Expédition</p>
                                            <p class="text-sm text-gray-600">Vous serez notifié dès l'expédition</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Informations utiles -->
                            <div>
                                <div class="flex items-center mb-6">
                                    <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-xl flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-2xl font-black text-gray-900">Bon à savoir</h3>
                                </div>

                                <div class="space-y-4">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-green-500 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <p class="text-sm text-gray-700">Suivi en temps réel de votre commande disponible</p>
                                    </div>

                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-green-500 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <p class="text-sm text-gray-700">Service client disponible pour toute question</p>
                                    </div>

                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-green-500 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <p class="text-sm text-gray-700">Facture téléchargeable dans votre espace client</p>
                                    </div>

                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-green-500 mr-3 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        <p class="text-sm text-gray-700">Livraison sécurisée et suivie</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions principales -->
                    <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6 mb-8">
                        <a href="{{ route('shop.index') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <circle cx="9" cy="21" r="1"/>
                                <circle cx="20" cy="21" r="1"/>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                            </svg>
                            Continuer mes achats
                        </a>

                        <a href="{{ route('order.history') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-gray-600 to-gray-700 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                            </svg>
                            Voir mes commandes
                        </a>

                        <a href="{{ route('client.dashboard') }}" class="inline-flex items-center px-8 py-4 border-2 border-gray-300 text-gray-700 font-bold rounded-xl hover:bg-gray-50 hover:border-gray-400 transition-all duration-300 transform hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/>
                                <path d="M8 1v6"/>
                            </svg>
                            Mon tableau de bord
                        </a>
                    </div>

                    <!-- Citation motivante -->
                    <div class="text-center">
                        <div class="max-w-2xl mx-auto bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl p-6 border border-blue-100">
                            <svg class="w-8 h-8 text-blue-400 mx-auto mb-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
                            </svg>
                            <p class="text-lg text-gray-700 font-medium italic mb-3">
                                "Merci de nous faire confiance ! Votre satisfaction est notre priorité absolue."
                            </p>
                            <p class="text-sm text-gray-500 font-semibold">L'équipe</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Styles pour les animations -->
    <style>
        @keyframes bounce-in {
            0% {
                transform: scale(0.3);
                opacity: 0;
            }
            50% {
                transform: scale(1.05);
            }
            70% {
                transform: scale(0.9);
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .animate-bounce-in {
            animation: bounce-in 0.8s ease-out;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
    </style>

    <!-- Script pour ajouter des animations au chargement -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ajouter l'animation bounce-in à l'icône
            const icon = document.querySelector('.relative.w-32.h-32');
            if (icon) {
                icon.classList.add('animate-bounce-in');

                // Ajouter l'animation float après l'animation bounce-in
                setTimeout(() => {
                    icon.classList.remove('animate-bounce-in');
                    icon.classList.add('animate-float');
                }, 800);
            }
        });
    </script>
@endsection
