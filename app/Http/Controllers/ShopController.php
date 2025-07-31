<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'primaryImage']);

        // Filtrage par catégorie
        if ($request->has('categorie') && $request->categorie != '') {
            $query->where('category_id', $request->categorie);
        }

        // Recherche par mot-clé
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Tri
        $sort = $request->get('sort', 'created_at');
        $order = $request->get('order', 'desc');
        $query->orderBy($sort, $order);

        $products = $query->paginate(12);
        
        // Cache des catégories pour améliorer les performances
        $categories = cache()->remember('categories', 3600, function () {
            return Category::all();
        });

        // Cache des favoris si l'utilisateur est connecté
        $favorites = collect();
        if (Auth::check()) {
            $favorites = cache()->remember('user_favorites_' . Auth::id(), 300, function () {
                return Auth::user()->favorites()->pluck('product_id');
            });
        }

        return view('shop.index', compact('products', 'categories', 'favorites'));
    }

    public function show(Product $product)
    {
        $product->load(['category', 'images']);
        return view('shop.show', compact('product'));
    }

    public function storeFavorite(Product $product)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        Auth::user()->favorites()->firstOrCreate(['product_id' => $product->id]);
        return back();
    }

    public function destroyFavorite(Product $product)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        Auth::user()->favorites()->where('product_id', $product->id)->delete();
        return back();
    }
} 