@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col justify-center items-center bg-[#f6f8fa] py-12">
    <div class="w-full max-w-2xl bg-white rounded-lg shadow-lg p-8">
        <h1 class="text-2xl font-bold text-center mb-8 text-gray-900">Détail du produit</h1>
        <div class="flex flex-col md:flex-row gap-8 mb-8">
            <div class="md:w-1/2 w-full flex flex-col items-center">
                @if($product->primaryImage)
                    <img src="{{ asset($product->primaryImage->path) }}" alt="{{ $product->name }}" class="w-full h-56 object-cover rounded-lg mb-4" />
                @else
                    <img src="/placeholder.svg" alt="{{ $product->name }}" class="w-full h-56 object-cover rounded-lg mb-4" />
                @endif
            </div>
            <div class="md:w-1/2 w-full flex flex-col justify-between">
                <div>
                    <div class="text-2xl font-bold text-gray-900 mb-2">{{ $product->name }}</div>
                    <div class="text-gray-500 mb-2">Catégorie : {{ $product->category->name ?? '-' }}</div>
                    <div class="text-xl font-bold text-[#2563eb] mb-4">{{ number_format($product->price, 0, '', ' ') }} FCFA</div>
                    <div class="mb-4">Stock : <span class="font-semibold">{{ $product->stock }}</span></div>
                    <div class="mb-4 text-gray-700 leading-relaxed">{!! nl2br(e($product->description)) !!}</div>
                </div>
                <div class="flex gap-2 mt-4">
                    <a href="{{ route('admin.products.edit', $product) }}" class="flex-1">
                        <button class="w-full bg-[#2563eb] text-white py-2 rounded font-semibold hover:bg-[#181c2a] transition">Éditer</button>
                    </a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full border border-red-500 bg-white py-2 rounded font-semibold text-red-600 hover:bg-red-50 transition">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-8">
            <a href="{{ route('admin.products.index') }}">
                <button class="bg-[#2563eb] text-white px-6 py-2 rounded font-semibold hover:bg-[#181c2a] transition">Retour à la liste</button>
            </a>
        </div>
    </div>
</div>
@endsection 