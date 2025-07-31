@extends('layouts.app')

@section('content')
<div class="bg-[#f6f8fa] min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold mb-8 text-gray-900 text-center md:text-left">Mes favoris</h1>
        @if($favorites->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach($favorites as $product)
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition-shadow flex flex-col h-full">
                <a href="{{ route('shop.show', $product) }}" class="block">
                    @if($product->primaryImage)
                        <img src="{{ asset($product->primaryImage->path) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-t-lg" />
                    @else
                        <img src="/placeholder.svg" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-t-lg" />
                    @endif
                </a>
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <div class="text-base font-semibold mb-2 text-gray-900">{{ $product->name }}</div>
                        <p class="text-2xl font-bold text-[#2563eb] mb-4">{{ number_format($product->price, 0, '', ' ') }} FCFA</p>
                    </div>
                    <div class="flex gap-2">
                        <form action="{{ route('shop.unfavorite', $product) }}" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full border border-[#2563eb] bg-white py-2 rounded font-semibold text-[#2563eb] hover:bg-[#f1f5ff] transition">Retirer</button>
                        </form>
                        <a href="{{ route('shop.show', $product) }}" class="flex-1">
                            <button class="w-full bg-[#181c2a] text-white py-2 rounded font-semibold border border-[#181c2a] hover:bg-[#2563eb] hover:border-[#2563eb] transition">Voir</button>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="bg-white rounded-lg shadow p-8 text-center text-gray-500 text-lg">
            Aucun favori pour le moment.
        </div>
        @endif
    </div>
</div>
@endsection 