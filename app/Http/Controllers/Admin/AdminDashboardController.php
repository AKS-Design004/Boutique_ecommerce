<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Statistiques principales
        $chiffreAffaires = Order::where('payment_status', 'paye')->sum('total');
        $nbCommandes = Order::count();
        $nbClients = User::where('role', 'client')->count();
        $nbProduits = Product::count();

        // Produits les plus vendus
        $produitsTop = OrderItem::selectRaw('product_id, SUM(quantity) as total_vendus')
            ->groupBy('product_id')
            ->orderByDesc('total_vendus')
            ->with(['product.category'])
            ->take(5)
            ->get();

        // Commandes récentes
        $commandesRecentes = Order::with(['user'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Statistiques par mois (pour les graphiques futurs)
        $connection = DB::connection();
        $driver = $connection->getDriverName();
        
        if ($driver === 'pgsql') {
            // PostgreSQL
            $statsParMois = Order::selectRaw('
                    EXTRACT(MONTH FROM created_at) as mois,
                    COUNT(*) as nb_commandes,
                    SUM(total) as chiffre_affaires
                ')
                ->whereYear('created_at', date('Y'))
                ->groupBy('mois')
                ->orderBy('mois')
                ->get();
        } else {
            // MySQL
            $statsParMois = Order::selectRaw('
                    MONTH(created_at) as mois,
                    COUNT(*) as nb_commandes,
                    SUM(total) as chiffre_affaires
                ')
                ->whereYear('created_at', date('Y'))
                ->groupBy('mois')
                ->orderBy('mois')
                ->get();
        }

        // Produits en rupture de stock
        $produitsRupture = Product::where('stock', '<=', 5)
            ->with('category')
            ->take(5)
            ->get();

        // Commandes en attente
        $commandesEnAttente = Order::where('status', 'pending')
            ->with('user')
            ->count();

        return view('admin.dashboard', compact(
            'chiffreAffaires',
            'nbCommandes', 
            'nbClients',
            'nbProduits',
            'produitsTop',
            'commandesRecentes',
            'statsParMois',
            'produitsRupture',
            'commandesEnAttente'
        ));
    }
}
