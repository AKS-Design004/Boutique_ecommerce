<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Vêtements', 'description' => 'Mode et vêtements pour tous']);
        Category::create(['name' => 'Chaussures', 'description' => 'Chaussures pour hommes, femmes et enfants']);
        Category::create(['name' => 'Accessoires', 'description' => 'Accessoires de mode et utilitaires']);
        Category::create(['name' => 'Électroniques', 'description' => 'Appareils électroniques et gadgets']);
    }
}
