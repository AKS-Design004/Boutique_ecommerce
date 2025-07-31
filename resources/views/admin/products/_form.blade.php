@csrf
@method(isset($product) ? 'PUT' : 'POST')

<!-- Nom du produit -->
<div class="mb-6">
    <label for="name" class="block text-sm font-bold text-gray-700 uppercase tracking-wide mb-2">Nom du produit</label>
    <input type="text" name="name" id="name" value="{{ old('name', $product->name ?? '') }}" required class="w-full border border-gray-200 rounded-xl px-4 py-3 text-gray-900 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:shadow-md bg-white/50">
    @error('name')
    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
    @enderror
</div>

<!-- Description -->
<div class="mb-6">
    <label for="description" class="block text-sm font-bold text-gray-700 uppercase tracking-wide mb-2">Description</label>
    <textarea name="description" id="description" rows="5" class="w-full border border-gray-200 rounded-xl px-4 py-3 text-gray-900 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:shadow-md bg-white/50">{{ old('description', $product->description ?? '') }}</textarea>
    @error('description')
    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
    @enderror
</div>

<!-- Prix -->
<div class="mb-6">
    <label for="price" class="block text-sm font-bold text-gray-700 uppercase tracking-wide mb-2">Prix (FCFA)</label>
    <input type="number" step="1" name="price" id="price" value="{{ old('price', isset($product->price) ? number_format($product->price, 0, '', '') : '') }}" required class="w-full border border-gray-200 rounded-xl px-4 py-3 text-gray-900 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:shadow-md bg-white/50">
    @error('price')
    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
    @enderror
</div>

<!-- Stock -->
<div class="mb-6">
    <label for="stock" class="block text-sm font-bold text-gray-700 uppercase tracking-wide mb-2">Stock</label>
    <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock ?? '') }}" required class="w-full border border-gray-200 rounded-xl px-4 py-3 text-gray-900 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:shadow-md bg-white/50">
    @error('stock')
    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
    @enderror
</div>

<!-- Catégorie -->
<div class="mb-6">
    <label for="category_id" class="block text-sm font-bold text-gray-700 uppercase tracking-wide mb-2">Catégorie</label>
    <select name="category_id" id="category_id" required class="w-full border border-gray-200 rounded-xl px-4 py-3 text-gray-900 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 hover:shadow-md bg-white/50">
        <option value="">-- Sélectionner --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>
    @error('category_id')
    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
    @enderror
</div>

<!-- Images -->
<div class="mb-6">
    <label for="images" class="block text-sm font-bold text-gray-700 uppercase tracking-wide mb-2">Images du produit</label>

    <!-- Affichage des images actuelles -->
    @if(isset($product) && $product->images->count() > 0)
        <div class="mb-4">
            <p class="text-sm text-gray-600 mb-2">Images actuelles :</p>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                @foreach($product->images as $image)
                    <div class="relative group">
                        <img src="{{ asset('storage/products/' . basename($image->path)) }}" alt="{{ $product->name }}" class="w-24 h-24 object-cover rounded-xl shadow-lg border-2 border-white hover:shadow-xl hover:scale-105 transition-all duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-xl"></div>
                        <div class="absolute inset-0 bg-black bg-opacity-50 group-hover:flex hidden items-center justify-center rounded-xl">
                            <div class="flex space-x-2">
                                @if(!$image->is_primary)
                                    <button type="button" onclick="setPrimaryImage({{ $product->id }}, {{ $image->id }})" class="bg-gradient-to-r from-green-500 to-emerald-500 text-white p-2 rounded-full hover:from-green-600 hover:to-emerald-600 transition-all duration-300 transform hover:scale-110">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </button>
                                @endif
                                <label class="flex items-center">
                                    <input type="checkbox" name="delete_images[]" value="{{ $image->id }}" class="mr-2 rounded border-gray-300 text-purple-500 focus:ring-purple-500">
                                    <span class="text-white text-sm font-medium">Supprimer</span>
                                </label>
                            </div>
                        </div>
                        @if($image->is_primary)
                            <div class="absolute top-0 right-0 bg-gradient-to-r from-green-500 to-emerald-500 text-white text-xs px-2 py-1 rounded-bl">
                                Principal
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Upload de nouvelles images -->
    <div class="border-2 border-dashed border-gray-200 rounded-xl p-6 text-center hover:border-purple-400 transition-all duration-300 bg-gradient-to-br from-gray-50 to-purple-50/20">
        <input type="file" name="images[]" id="images" multiple class="hidden" accept="image/*" onchange="previewImages()">
        <label for="images" class="cursor-pointer">
            <svg class="h-12 w-12 text-gray-400 mx-auto mb-3 hover:text-purple-500 transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <p class="text-gray-600 font-bold">Cliquez pour sélectionner des images</p>
            <p class="text-sm text-gray-500 mt-1">PNG, JPG, JPEG jusqu'à 2MB</p>
        </label>
    </div>

    <!-- Prévisualisation des nouvelles images -->
    <div id="image-preview" class="mt-4 hidden">
        <p class="text-sm text-gray-600 mb-2">Aperçu :</p>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
        </div>
    </div>
    @error('images.*')
    <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
    @enderror
</div>

<!-- Boutons d'action -->
<div class="flex items-center justify-end space-x-4">
    <a href="{{ route('admin.products.index') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-200 to-gray-300 text-gray-700 font-bold rounded-2xl hover:from-gray-300 hover:to-gray-400 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
        Annuler
    </a>
    <button type="submit" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-500 text-white font-bold rounded-2xl hover:from-purple-600 hover:to-pink-600 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
        </svg>
        {{ isset($product) ? 'Mettre à jour' : 'Créer' }}
    </button>
</div>

<script>
    function previewImages() {
        const previewContainer = document.getElementById('image-preview').querySelector('.grid');
        previewContainer.innerHTML = ''; // Réinitialiser la prévisualisation
        const previewTitle = document.getElementById('image-preview');
        previewTitle.classList.remove('hidden');

        const files = document.getElementById('images').files;

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();

            reader.onload = function(e) {
                const imgContainer = document.createElement('div');
                imgContainer.className = 'relative';

                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'w-24 h-24 object-cover rounded-xl shadow-lg border-2 border-white';

                const gradientOverlay = document.createElement('div');
                gradientOverlay.className = 'absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-xl';

                imgContainer.appendChild(img);
                imgContainer.appendChild(gradientOverlay);
                previewContainer.appendChild(imgContainer);
            }

            reader.readAsDataURL(file);
        }
    }

    function setPrimaryImage(productId, imageId) {
        if (confirm('Voulez-vous vraiment définir cette image comme image principale ?')) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/admin/products/${productId}/images/${imageId}/set-primary`;
            
            const tokenInput = document.createElement('input');
            tokenInput.type = 'hidden';
            tokenInput.name = '_token';
            tokenInput.value = '{{ csrf_token() }}';
            form.appendChild(tokenInput);
            
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
