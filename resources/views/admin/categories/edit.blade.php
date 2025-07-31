@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-8">
    <h1 class="text-xl font-bold mb-6">Modifier la catégorie</h1>
    <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow rounded p-6">
        @csrf
        @method('PUT')
        @include('admin.categories._form')
        <button class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Mettre à jour</button>
        <a href="{{ route('admin.categories.index') }}" class="ml-2 text-gray-600 hover:underline">Annuler</a>
    </form>
</div>
@endsection 