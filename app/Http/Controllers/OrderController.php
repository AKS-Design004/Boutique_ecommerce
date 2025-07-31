<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\OrderConfirmedNotification;


class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart', []);
        $total = collect($cart)->sum(function($item) {
            return $item['price'] * $item['quantity'];
        });
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Votre panier est vide.');
        }
        return view('order.checkout', compact('cart', 'total'));
    }

    public function process(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Votre panier est vide.');
        }
        $request->validate([
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:30',
            'payment_method' => 'required|in:en_ligne,a_la_livraison',
        ]);
        // Vérification du stock
        foreach ($cart as $productId => $item) {
            $product = \App\Models\Product::find($productId);
            if (!$product || $product->stock < $item['quantity']) {
                return redirect()->route('cart.index')->with('error', 'Stock insuffisant pour le produit : ' . ($product->name ?? 'Inconnu'));
            }
        }
        $total = collect($cart)->sum(function($item) {
            return $item['price'] * $item['quantity'];
        });
        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $total,
            'status' => 'en_attente',
            'payment_status' => 'en_attente',
            'address' => $request->address,
            'phone' => $request->phone,
            'payment_method' => $request->payment_method,
        ]);
        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
            // Décrémenter le stock
            $product = \App\Models\Product::find($productId);
            $product->decrement('stock', $item['quantity']);
        }
        Payment::create([
            'order_id' => $order->id,
            'amount' => $total,
            'status' => 'en_attente',
            'payment_method' => $request->payment_method,
        ]);
        // Envoyer la notification de confirmation
        Auth::user()->notify(new OrderConfirmedNotification($order));
        session()->forget('cart');
        return redirect()->route('order.confirmation');
    }

    public function confirmation()
    {
        return view('order.confirmation');
    }

    public function history()
    {
        $orders = \App\Models\Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
        return view('order.history', compact('orders'));
    }

    public function historyShow(\App\Models\Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        $order->load(['orderItems.product', 'payment']);
        return view('order.history_show', compact('order'));
    }

    public function invoice(\App\Models\Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        $order->load(['orderItems.product', 'payment']);
        $pdf = \PDF::loadView('order.invoice', compact('order'));
        return $pdf->download('facture-commande-' . $order->id . '.pdf');
    }
} 