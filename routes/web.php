<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;


Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('products', AdminProductController::class);
    Route::resource('orders', AdminOrderController::class)->only(['index', 'show', 'edit', 'update', 'destroy']);
    Route::resource('users', AdminUserController::class);
    Route::post('/products/{product}/images/{image}/set-primary', [AdminProductController::class, 'setPrimaryImage'])
        ->name('products.set-primary-image');
});

// Page d'accueil moderne
Route::get('/', [HomeController::class, 'index'])->name('home');


// Front-office catalogue
Route::get('/boutique', [ShopController::class, 'index'])->name('shop.index');
Route::get('/produit/{product}', [ShopController::class, 'show'])->name('shop.show');

// Favoris
Route::middleware('auth')->group(function () {
    Route::post('/produit/{product}/favori', [App\Http\Controllers\ShopController::class, 'storeFavorite'])->name('shop.favorite');
    Route::delete('/produit/{product}/favori', [App\Http\Controllers\ShopController::class, 'destroyFavorite'])->name('shop.unfavorite');
});

// Panier
Route::get('/panier', [CartController::class, 'index'])->name('cart.index');
Route::post('/panier/ajouter/{product}', [CartController::class, 'add'])->name('cart.add');
Route::patch('/panier/modifier/{product}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/panier/supprimer/{product}', [CartController::class, 'remove'])->name('cart.remove');

// Passage de commande (checkout)
Route::middleware('auth')->group(function () {
    Route::get('/commande', [OrderController::class, 'checkout'])->name('order.checkout');
    Route::post('/commande', [OrderController::class, 'process'])->name('order.process');
    Route::get('/commande/confirmation', [OrderController::class, 'confirmation'])->name('order.confirmation');
});

// Historique commandes client
Route::middleware('auth')->group(function () {
    Route::get('/mes-commandes', [OrderController::class, 'history'])->name('order.history');
    Route::get('/mes-commandes/{order}', [OrderController::class, 'historyShow'])->name('order.history.show');
});

// Facture PDF (client)
Route::middleware('auth')->get('/facture/{order}', [OrderController::class, 'invoice'])->name('order.invoice');
// Facture PDF (admin)
Route::middleware(['auth', 'admin'])->get('/admin/facture/{order}', [\App\Http\Controllers\Admin\AdminOrderController::class, 'invoice'])->name('admin.order.invoice');

// Routes client
Route::middleware('auth')->prefix('client')->name('client.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\ClientController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [App\Http\Controllers\ClientController::class, 'profile'])->name('profile');
    Route::put('/profile', [App\Http\Controllers\ClientController::class, 'updateProfile'])->name('profile.update');
});

Route::get('/health', function () {
    return response()->json(['status' => 'ok'], 200);
});

// Redirection dashboard selon le rôle
Route::get('/dashboard', function () {
    if (auth()->user()->is_admin) {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('client.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
