<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Notifications\OrderStatusChangedNotification;


class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load(['user', 'orderItems.product', 'payment']);
        return view('admin.orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $order->load(['user', 'orderItems.product', 'payment']);
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:en_attente,expediee,livree,annulee',
            'payment_status' => 'required|in:en_attente,paye',
        ]);
        $order->update($request->only('status', 'payment_status'));
        // Mettre à jour le paiement si besoin
        if ($order->payment) {
            $order->payment->update([
                'status' => $request->payment_status,
                'paid_at' => $request->payment_status === 'paye' ? now() : null,
            ]);
        }
        // Envoyer la notification de changement de statut
        $order->user->notify(new OrderStatusChangedNotification($order));
        return redirect()->route('admin.orders.show', $order)->with('success', 'Commande mise à jour.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Commande supprimée.');
    }

    public function invoice(\App\Models\Order $order)
    {
        $order->load(['user', 'orderItems.product', 'payment']);
        $pdf = \PDF::loadView('order.invoice', compact('order'));
        return $pdf->download('facture-commande-' . $order->id . '.pdf');
    }
}
