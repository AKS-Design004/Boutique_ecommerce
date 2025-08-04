<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        // Sélectionner des produits vedettes de différentes catégories
        $featuredProducts = collect();
        
        // Récupérer toutes les catégories
        $categories = Category::all();
        
        // Pour chaque catégorie, sélectionner 2 produits vedettes
        foreach ($categories as $category) {
            $categoryProducts = Product::available()
                ->where('category_id', $category->id)
                ->with(['category', 'primaryImage'])
                ->inRandomOrder()
                ->take(2)
                ->get();
                
            $featuredProducts = $featuredProducts->merge($categoryProducts);
        }
        
        // Si on n'a pas assez de produits, compléter avec des produits aléatoires
        if ($featuredProducts->count() < 8) {
            $remainingProducts = Product::available()
                ->with(['category', 'primaryImage'])
                ->whereNotIn('id', $featuredProducts->pluck('id'))
                ->inRandomOrder()
                ->take(8 - $featuredProducts->count())
                ->get();
                
            $featuredProducts = $featuredProducts->merge($remainingProducts);
        }
        
        // Limiter à 8 produits maximum et mélanger l'ordre
        $featuredProducts = $featuredProducts->shuffle()->take(8);

        return view('welcome', compact('featuredProducts'));
    }
}