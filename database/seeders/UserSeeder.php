<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@shop.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'is_admin' => true,
            'phone' => '+33 1 23 45 67 89',
            'address' => '123 Rue de l\'Administration, 75001 Paris',
        ]);
        
        User::create([
            'name' => 'Client',
            'email' => 'client@shop.com',
            'password' => Hash::make('password'),
            'role' => 'client',
            'is_admin' => false,
            'phone' => '+33 6 12 34 56 78',
            'address' => '456 Avenue du Client, 75002 Paris',
        ]);
    }
}
