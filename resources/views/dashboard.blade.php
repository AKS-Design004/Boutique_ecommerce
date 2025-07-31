@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col justify-center items-center bg-[#f6f8fa] py-12">
    <div class="w-full max-w-2xl bg-white rounded-lg shadow-lg p-8">
        <h1 class="text-2xl font-bold text-center mb-8 text-gray-900">Mon espace</h1>
        <div class="mb-8 flex flex-col items-center">
            <div class="w-20 h-20 rounded-full bg-[#e0e7ff] flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#2563eb]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <div class="text-xl font-semibold text-gray-900 mb-1">{{ Auth::user()->name }}</div>
            <div class="text-gray-500 mb-2">{{ Auth::user()->email }}</div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <a href="{{ route('order.history') }}" class="bg-[#f6f8fa] rounded-lg p-6 flex flex-col items-center hover:bg-[#e0e7ff] transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#2563eb] mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M3 7V6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v1M3 7l1.553 9.32A2 2 0 0 0 6.53 18h10.94a2 2 0 0 0 1.978-1.68L21 7M3 7h18"/></svg>
                <div class="font-semibold text-gray-900">Mes commandes</div>
            </a>
            <a href="{{ route('favorites.index') }}" class="bg-[#f6f8fa] rounded-lg p-6 flex flex-col items-center hover:bg-[#e0e7ff] transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#2563eb] mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M19.5 13.572l-7.5 7.5-7.5-7.5A5.25 5.25 0 0 1 12 6.75a5.25 5.25 0 0 1 7.5 6.822z"/></svg>
                <div class="font-semibold text-gray-900">Mes favoris</div>
            </a>
            <a href="{{ route('client.profile') }}" class="bg-[#f6f8fa] rounded-lg p-6 flex flex-col items-center hover:bg-[#e0e7ff] transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#2563eb] mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <div class="font-semibold text-gray-900">Mon profil</div>
            </a>
        </div>
        <div class="text-center">
            <a href="{{ route('shop.index') }}" class="text-[#2563eb] hover:underline">Retour à la boutique</a>
        </div>
    </div>
</div>
@endsection
