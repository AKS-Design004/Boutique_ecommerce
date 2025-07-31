<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\Order;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        $order = Order::first();

        Payment::create([
            'order_id' => $order->id,
            'amount' => $order->total,
            'status' => 'en_attente',
            'payment_method' => 'en_ligne',
            'paid_at' => null,
        ]);
    }
}
