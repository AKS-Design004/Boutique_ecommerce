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
                                {{ isset($category) ? 'Modifier la catégorie' : 'Nouvelle catégorie' }}
                            </h1>
                            <p class="text-gray-600 text-lg">
                                {{ isset($category) ? 'Mettez à jour les détails de la catégorie' : 'Créez une nouvelle catégorie pour votre boutique' }}
                            </p>
                        </div>
                        <a href="{{ route('admin.categories.index') }}" class="group inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-200 to-gray-300 text-gray-700 font-bold rounded-2xl hover:from-gray-300 hover:to-gray-400 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                            Retour aux catégories
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
                        <form action="{{ isset($category) ? route('admin.categories.update', $category) : route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($category))
                                @method('PUT')
                            @endif

                            <!-- Nom de la catégorie -->
                            <div class="mb-6">
                                <label for="name" class="block text-sm font-bold text-gray-700 uppercase tracking-wide mb-2">Nom de la catégorie</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $category->name ?? '') }}" required class="w-full border border-gray-200 rounded-xl px-4 py-3 text-gray-900 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:shadow-md bg-white/50">
                                @error('name')
                                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="mb-6">
                                <label for="description" class="block text-sm font-bold text-gray-700 uppercase tracking-wide mb-2">Description</label>
                                <textarea name="description" id="description" rows="5" class="w-full border border-gray-200 rounded-xl px-4 py-3 text-gray-900 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:shadow-md bg-white/50">{{ old('description', $category->description ?? '') }}</textarea>
                                @error('description')
                                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Image de la catégorie -->
                            <div class="mb-6">
                                <label for="image" class="block text-sm font-bold text-gray-700 uppercase tracking-wide mb-2">Image de la catégorie</label>

                                <!-- Affichage de l'image actuelle -->
                                @if(isset($category) && $category->image)
                                    <div class="mb-4">
                                        <p class="text-sm text-gray-600 mb-2">Image actuelle :</p>
                                        <div class="flex items-center space-x-4">
                                            <div class="relative">
                                                <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" class="w-24 h-24 object-cover rounded-xl shadow-lg border-2 border-white hover:shadow-xl hover:scale-105 transition-all duration-300">
                                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-xl"></div>
                                            </div>
                                            <div>
                                                <p class="text-sm text-gray-500">{{ basename($category->image) }}</p>
                                                <label class="flex items-center mt-2">
                                                    <input type="checkbox" name="remove_image" class="mr-2 rounded border-gray-300 text-purple-500 focus:ring-purple-500">
                                                    <span class="text-sm text-red-600 font-medium">Supprimer cette image</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Upload de nouvelle image -->
                                <div class="border-2 border-dashed border-gray-200 rounded-xl p-6 text-center hover:border-purple-400 transition-all duration-300 bg-gradient-to-br from-gray-50 to-purple-50/20">
                                    <input type="file" name="image" id="image" accept="image/*" class="hidden" onchange="previewImage(this)">
                                    <label for="image" class="cursor-pointer">
                                        <svg class="h-12 w-12 text-gray-400 mx-auto mb-3 hover:text-purple-500 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <p class="text-gray-600 font-bold">Cliquez pour sélectionner une image</p>
                                        <p class="text-sm text-gray-500 mt-1">PNG, JPG, JPEG jusqu'à 2MB</p>
                                    </label>
                                </div>

                                <!-- Prévisualisation de la nouvelle image -->
                                <div id="image-preview" class="mt-4 hidden">
                                    <p class="text-sm text-gray-600 mb-2">Aperçu :</p>
                                    <div class="relative">
                                        <img id="preview" class="w-24 h-24 object-cover rounded-xl shadow-lg border-2 border-white hover:shadow-xl hover:scale-105 transition-all duration-300">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-xl"></div>
                                    </div>
                                </div>

                                @error('image')
                                <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Boutons d'action -->
                            <div class="flex items-center justify-end space-x-4">
                                <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-200 to-gray-300 text-gray-700 font-bold rounded-2xl hover:from-gray-300 hover:to-gray-400 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                    Annuler
                                </a>
                                <button type="submit" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold rounded-2xl hover:from-purple-600 hover:to-pink-600 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    {{ isset($category) ? 'Mettre à jour' : 'Créer' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('preview');
            const previewContainer = document.getElementById('image-preview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                previewContainer.classList.add('hidden');
            }
        }
    </script>
@endsection
