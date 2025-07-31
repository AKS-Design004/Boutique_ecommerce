<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class OptimizeExistingProductImages extends Command
{
    protected $signature = 'images:optimize-products';
    protected $description = 'Optimise et redimensionne toutes les images produits déjà présentes dans storage/app/public/products';

    public function handle()
    {
        $directory = storage_path('app/public/products');
        $files = glob($directory . '/*.{jpg,jpeg,png}', GLOB_BRACE);
        $count = 0;
        $manager = new \Intervention\Image\ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
        foreach ($files as $file) {
            $img = $manager->read($file)
                ->resize(800, 800, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->toJpeg(80);
            $img->save($file);
            $count++;
        }
        $this->info("$count images optimisées dans $directory");
    }
}
