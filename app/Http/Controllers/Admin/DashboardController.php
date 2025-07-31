<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Chiffre d'affaires total
        $totalRevenue = Order::where('payment_status', 'paye')->sum('total');
        
        // Nombre de commandes
        $orderCount = Order::count();
        
        // Produits les plus vendus
        $topProducts = Product::select('products.*', DB::raw('SUM(order_items.quantity) as total_sold'))
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->groupBy('products.id')
            ->orderByDesc('total_sold')
            ->limit(5)
            ->get();
        
        // Statistiques de paiement
        $paymentStats = Order::select('payment_status', DB::raw('count(*) as count'))
            ->groupBy('payment_status')
            ->get()
            ->pluck('count', 'payment_status');

        return view('admin.dashboard', compact(
            'totalRevenue',
            'orderCount',
            'topProducts',
            'paymentStats'
        ));
    }
}