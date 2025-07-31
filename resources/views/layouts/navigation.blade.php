<nav x-data="{ open: false }" class="header-blur shadow-lg sticky top-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo et nom du site -->
            <div class="flex items-center space-x-4 flex-shrink-0">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-4">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full blur opacity-75"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="relative h-10 w-10 text-white bg-gradient-to-r from-blue-600 to-purple-600 rounded-full p-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path d="M3 7V6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v1M3 7l1.553 9.32A2 2 0 0 0 6.53 18h10.94a2 2 0 0 0 1.978-1.68L21 7M3 7h18"/>
                        </svg>
                    </div>
                    <div>
                        <span class="text-3xl font-black bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">{{ config('app.name') }}</span>
                        <div class="text-xs text-gray-500 font-medium">Votre boutique moderne</div>
                    </div>
                </a>
            </div>

            <!-- Navigation centrale -->
            <nav class="hidden md:flex space-x-12 flex-1 justify-center mx-8">
                @auth
                    @if(Auth::user() && Auth::user()->isAdmin())
                        <!-- Liens uniquement pour les admins -->
                        <a href="{{ route('admin.dashboard') }}" class="relative text-gray-700 hover:text-blue-600 font-semibold text-lg transition-all duration-300 group {{ request()->routeIs('admin.dashboard') ? 'text-blue-600' : '' }}">
                            Dashboard
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover:w-full {{ request()->routeIs('admin.dashboard') ? 'w-full' : '' }}"></span>
                        </a>
                        <a href="{{ route('admin.categories.index') }}" class="relative text-gray-700 hover:text-blue-600 font-semibold text-lg transition-all duration-300 group {{ request()->routeIs('admin.categories.*') ? 'text-blue-600' : '' }}">
                            Catégories
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover:w-full {{ request()->routeIs('admin.categories.*') ? 'w-full' : '' }}"></span>
                        </a>
                        <a href="{{ route('admin.products.index') }}" class="relative text-gray-700 hover:text-blue-600 font-semibold text-lg transition-all duration-300 group {{ request()->routeIs('admin.products.*') ? 'text-blue-600' : '' }}">
                            Gestion Produits
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover:w-full {{ request()->routeIs('admin.products.*') ? 'w-full' : '' }}"></span>
                        </a>
                        <a href="{{ route('admin.orders.index') }}" class="relative text-gray-700 hover:text-blue-600 font-semibold text-lg transition-all duration-300 group {{ request()->routeIs('admin.orders.*') ? 'text-blue-600' : '' }}">
                            Commandes
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover:w-full {{ request()->routeIs('admin.orders.*') ? 'w-full' : '' }}"></span>
                        </a>
                        <a href="{{ route('admin.users.index') }}" class="relative text-gray-700 hover:text-blue-600 font-semibold text-lg transition-all duration-300 group {{ request()->routeIs('admin.users.*') ? 'text-blue-600' : '' }}">
                            Utilisateurs
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover:w-full {{ request()->routeIs('admin.users.*') ? 'w-full' : '' }}"></span>
                        </a>
                    @else
                        <!-- Liens pour les clients -->
                        <a href="{{ route('home') }}" class="relative text-gray-700 hover:text-blue-600 font-semibold text-lg transition-all duration-300 group {{ request()->routeIs('home') ? 'text-blue-600' : '' }}">
                            Accueil
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover:w-full {{ request()->routeIs('home') ? 'w-full' : '' }}"></span>
                        </a>
                        <a href="{{ route('shop.index') }}" class="relative text-gray-700 hover:text-blue-600 font-semibold text-lg transition-all duration-300 group {{ request()->routeIs('shop.*') ? 'text-blue-600' : '' }}">
                            Produits
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover:w-full {{ request()->routeIs('shop.*') ? 'w-full' : '' }}"></span>
                        </a>
                        <a href="{{ route('home') }}#about" class="relative text-gray-700 hover:text-blue-600 font-semibold text-lg transition-all duration-300 group">
                            À propos
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover:w-full"></span>
                        </a>
                        <a href="{{ route('client.dashboard') }}" class="relative text-gray-700 hover:text-blue-600 font-semibold text-lg transition-all duration-300 group {{ request()->routeIs('client.dashboard') ? 'text-blue-600' : '' }}">
                            Mon Espace
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover:w-full {{ request()->routeIs('client.dashboard') ? 'w-full' : '' }}"></span>
                        </a>
                        <a href="{{ route('order.history') }}" class="relative text-gray-700 hover:text-blue-600 font-semibold text-lg transition-all duration-300 group {{ request()->routeIs('order.history*') ? 'text-blue-600' : '' }}">
                            Mes Commandes
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover:w-full {{ request()->routeIs('order.history*') ? 'w-full' : '' }}"></span>
                        </a>
                    @endif
                @else
                    <!-- Liens pour les visiteurs non connectés -->
                    <a href="{{ route('home') }}" class="relative text-gray-700 hover:text-blue-600 font-semibold text-lg transition-all duration-300 group {{ request()->routeIs('home') ? 'text-blue-600' : '' }}">
                        Accueil
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover:w-full {{ request()->routeIs('home') ? 'w-full' : '' }}"></span>
                    </a>
                    <a href="{{ route('shop.index') }}" class="relative text-gray-700 hover:text-blue-600 font-semibold text-lg transition-all duration-300 group {{ request()->routeIs('shop.*') ? 'text-blue-600' : '' }}">
                        Produits
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover:w-full {{ request()->routeIs('shop.*') ? 'w-full' : '' }}"></span>
                    </a>
                    <a href="{{ route('home') }}#about" class="relative text-gray-700 hover:text-blue-600 font-semibold text-lg transition-all duration-300 group">
                        À propos
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                @endauth
            </nav>

            <!-- Actions utilisateur (droite) -->
            <div class="flex items-center space-x-6 flex-shrink-0">
                @auth
                    @if(!Auth::user()->isAdmin())
                        <!-- Panier uniquement pour les clients, pas pour les admins -->
                        <a href="{{ route('cart.index') }}" class="relative group">
                            <div class="flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-blue-50 to-purple-50 hover:from-blue-100 hover:to-purple-100 transition-all duration-300 transform hover:scale-105">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                                </svg>
                                <span class="ml-2 font-semibold text-gray-800">Panier</span>
                                <span class="ml-1 px-2 py-1 bg-gradient-to-r from-blue-600 to-purple-600 text-white text-xs rounded-full font-bold">{{ count(session('cart', [])) }}</span>
                            </div>
                        </a>
                    @endif
                @else
                    <!-- Panier pour les visiteurs non connectés -->
                    <a href="{{ route('cart.index') }}" class="relative group">
                        <div class="flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-blue-50 to-purple-50 hover:from-blue-100 hover:to-purple-100 transition-all duration-300 transform hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                            </svg>
                            <span class="ml-2 font-semibold text-gray-800">Panier</span>
                            <span class="ml-1 px-2 py-1 bg-gradient-to-r from-blue-600 to-purple-600 text-white text-xs rounded-full font-bold">{{ count(session('cart', [])) }}</span>
                        </div>
                    </a>
                @endauth

                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 transition duration-150 ease-in-out">
                                <div class="flex items-center space-x-2">
                                    <div class="w-8 h-8 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </div>
                                    <span class="font-semibold">{{ Auth::user()->name }}</span>
                                </div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            @if(Auth::user() && Auth::user()->isClient())
                                <x-dropdown-link :href="route('client.dashboard')">{{ __('Mon Espace') }}</x-dropdown-link>
                                <x-dropdown-link :href="route('client.profile')">{{ __('Mon Profil') }}</x-dropdown-link>
                                <x-dropdown-link :href="route('order.history')">{{ __('Mes Commandes') }}</x-dropdown-link>
                                <div class="border-t border-gray-100"></div>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}">
                        <button class="btn-primary text-white px-6 py-3 rounded-full font-semibold text-lg shadow-lg relative overflow-hidden">
                            Connexion
                        </button>
                    </a>
                @endauth

                <!-- Hamburger -->
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out md:hidden">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
            <div class="pt-2 pb-3 space-y-1">
                @auth
                    @if(Auth::user() && Auth::user()->isAdmin())
                        <!-- Liens uniquement pour les admins -->
                        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">{{ __('Dashboard Admin') }}</x-nav-link>
                        <x-nav-link :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories.*')">{{ __('Catégories') }}</x-nav-link>
                        <x-nav-link :href="route('admin.products.index')" :active="request()->routeIs('admin.products.*')">{{ __('Gestion Produits') }}</x-nav-link>
                        <x-nav-link :href="route('admin.orders.index')" :active="request()->routeIs('admin.orders.*')">{{ __('Commandes') }}</x-nav-link>
                        <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">{{ __('Utilisateurs') }}</x-nav-link>
                    @else
                        <!-- Liens pour les clients -->
                        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">{{ __('Accueil') }}</x-nav-link>
                        <x-nav-link :href="route('shop.index')" :active="request()->routeIs('shop.*')">{{ __('Produits') }}</x-nav-link>
                        <x-nav-link :href="route('home') . '#about'">{{ __('À propos') }}</x-nav-link>
                        <x-nav-link :href="route('client.dashboard')" :active="request()->routeIs('client.dashboard')">{{ __('Mon Espace') }}</x-nav-link>
                        <x-nav-link :href="route('order.history')" :active="request()->routeIs('order.history*')">{{ __('Mes Commandes') }}</x-nav-link>
                    @endif
                @else
                    <!-- Liens pour les visiteurs non connectés -->
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">{{ __('Accueil') }}</x-nav-link>
                    <x-nav-link :href="route('shop.index')" :active="request()->routeIs('shop.*')">{{ __('Produits') }}</x-nav-link>
                    <x-nav-link :href="route('home') . '#about'">{{ __('À propos') }}</x-nav-link>
                @endauth
            </div>
        </div>
    </div>
</nav>
