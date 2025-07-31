@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col justify-center items-center bg-[#f6f8fa] py-12">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
        <h1 class="text-2xl font-bold text-center mb-8 text-gray-900">Détail de la catégorie</h1>
        <div class="mb-6">
            <div class="text-xl font-semibold text-gray-900 mb-2">{{ $category->name }}</div>
            <div class="text-gray-500 mb-2">Créée le : {{ $category->created_at->format('d/m/Y') }}</div>
        </div>
        <div class="flex gap-2 mt-4">
            <a href="{{ route('admin.categories.edit', $category) }}" class="flex-1">
                <button class="w-full bg-[#2563eb] text-white py-2 rounded font-semibold hover:bg-[#181c2a] transition">Éditer</button>
            </a>
            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="flex-1">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full border border-red-500 bg-white py-2 rounded font-semibold text-red-600 hover:bg-red-50 transition">Supprimer</button>
            </form>
        </div>
        <div class="flex justify-center mt-8">
            <a href="{{ route('admin.categories.index') }}">
                <button class="bg-[#2563eb] text-white px-6 py-2 rounded font-semibold hover:bg-[#181c2a] transition">Retour à la liste</button>
            </a>
        </div>
    </div>
</div>
@endsection 