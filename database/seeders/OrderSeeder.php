<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $user = User::where('email', 'client@shop.com')->first();

        Order::create([
            'user_id' => $user->id,
            'total' => 524.97,
            'status' => 'en_attente',
            'payment_status' => 'en_attente',
            'address' => '123 rue de Paris',
            'phone' => '0600000000',
            'payment_method' => 'en_ligne',
        ]);
    }
}
