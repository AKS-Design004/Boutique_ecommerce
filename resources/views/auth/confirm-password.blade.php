@extends('layouts.guest')

@section('content')
<div class="min-h-screen flex flex-col justify-center items-center bg-[#f6f8fa] py-12">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
        <h1 class="text-2xl font-bold text-center mb-8 text-gray-900">Confirmer le mot de passe</h1>
        <div class="mb-4 text-gray-600 text-center">
            Cette opération nécessite la confirmation de votre mot de passe.
        </div>
        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
            @csrf
            <div>
                <label for="password" class="block text-gray-700 font-medium mb-1">Mot de passe</label>
                <input id="password" type="password" name="password" required autofocus class="w-full rounded border-gray-300 focus:ring-[#2563eb] focus:border-[#2563eb]">
                @error('password')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="w-full bg-[#2563eb] text-white py-3 rounded font-semibold hover:bg-[#181c2a] transition">Confirmer</button>
        </form>
        <div class="mt-6 text-center text-gray-600 text-sm">
            <a href="{{ route('login') }}" class="text-[#2563eb] hover:underline">Retour à la connexion</a>
        </div>
    </div>
</div>
@endsection
