<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all()->keyBy('name');

        $productsData = [
            // ===== VÊTEMENTS =====
            [
                'name' => 'T-shirt classique',
                'description' => 'T-shirt 100% coton, confortable et tendance. Parfait pour le quotidien.',
                'price' => 15.99,
                'stock' => 100,
                'category' => 'Vêtements',
                'images' => ['vetement1.jpg', 'vetement2.jpg']
            ],
            [
                'name' => 'Veste en jean',
                'description' => 'Veste en jean indémodable pour toutes saisons. Style casual et élégant.',
                'price' => 49.99,
                'stock' => 50,
                'category' => 'Vêtements',
                'images' => ['vetement3.jpg']
            ],
            [
                'name' => 'Polo élégant',
                'description' => 'Polo en coton piqué, parfait pour les occasions semi-formelles.',
                'price' => 25.99,
                'stock' => 75,
                'category' => 'Vêtements',
                'images' => ['vetement4.jpg']
            ],
            [
                'name' => 'Chemise Oxford',
                'description' => 'Chemise en coton Oxford, style casual chic. Idéale pour le bureau.',
                'price' => 35.99,
                'stock' => 60,
                'category' => 'Vêtements',
                'images' => ['vetement5.jpg']
            ],
            [
                'name' => 'Pantalon chino',
                'description' => 'Pantalon chino confortable, style casual élégant.',
                'price' => 45.99,
                'stock' => 40,
                'category' => 'Vêtements',
                'images' => ['vetement6.jpg']
            ],
            [
                'name' => 'Sweat à capuche',
                'description' => 'Sweat confortable avec capuche, parfait pour les jours frais.',
                'price' => 32.99,
                'stock' => 80,
                'category' => 'Vêtements',
                'images' => ['vetement7.jpg']
            ],
            [
                'name' => 'Robe d\'été',
                'description' => 'Robe légère et élégante, parfaite pour l\'été.',
                'price' => 55.99,
                'stock' => 30,
                'category' => 'Vêtements',
                'images' => ['vetement8.jpg']
            ],
            [
                'name' => 'Blazer casual',
                'description' => 'Blazer élégant pour les occasions spéciales.',
                'price' => 89.99,
                'stock' => 25,
                'category' => 'Vêtements',
                'images' => ['vetement9.jpg']
            ],
            [
                'name' => 'Short de sport',
                'description' => 'Short confortable pour les activités sportives.',
                'price' => 18.99,
                'stock' => 90,
                'category' => 'Vêtements',
                'images' => ['vetement10.jpg']
            ],
            [
                'name' => 'Cardigan en laine',
                'description' => 'Cardigan chaud et confortable pour l\'hiver.',
                'price' => 65.99,
                'stock' => 35,
                'category' => 'Vêtements',
                'images' => ['vetement11.jpg']
            ],

            // ===== CHAUSSURES =====
            [
                'name' => 'Baskets sport',
                'description' => 'Baskets légères idéales pour le sport et la ville.',
                'price' => 59.99,
                'stock' => 80,
                'category' => 'Chaussures',
                'images' => ['chaussure1.jpg', 'chaussure2.jpg']
            ],
            [
                'name' => 'Sandales été',
                'description' => 'Sandales confortables pour l\'été.',
                'price' => 29.99,
                'stock' => 60,
                'category' => 'Chaussures',
                'images' => ['chaussure3.jpg']
            ],
            [
                'name' => 'Chaussures de ville',
                'description' => 'Chaussures élégantes pour le bureau et les occasions formelles.',
                'price' => 79.99,
                'stock' => 45,
                'category' => 'Chaussures',
                'images' => ['chaussure4.jpg']
            ],
            [
                'name' => 'Bottes d\'hiver',
                'description' => 'Bottes chaudes et imperméables pour l\'hiver.',
                'price' => 95.99,
                'stock' => 30,
                'category' => 'Chaussures',
                'images' => ['chaussure5.jpg']
            ],
            [
                'name' => 'Tennis de running',
                'description' => 'Tennis spécialement conçues pour la course à pied.',
                'price' => 85.99,
                'stock' => 55,
                'category' => 'Chaussures',
                'images' => ['chaussure6.jpg']
            ],
            [
                'name' => 'Mocassins élégants',
                'description' => 'Mocassins en cuir pour un style raffiné.',
                'price' => 69.99,
                'stock' => 40,
                'category' => 'Chaussures',
                'images' => ['chaussure7.jpg']
            ],
            [
                'name' => 'Espadrilles',
                'description' => 'Espadrilles confortables pour l\'été.',
                'price' => 24.99,
                'stock' => 70,
                'category' => 'Chaussures',
                'images' => ['chaussure8.jpg']
            ],
            [
                'name' => 'Chaussures de sécurité',
                'description' => 'Chaussures de sécurité pour le travail.',
                'price' => 45.99,
                'stock' => 50,
                'category' => 'Chaussures',
                'images' => ['chaussure9.jpg']
            ],

            // ===== ACCESSOIRES =====
            [
                'name' => 'Sac à dos urbain',
                'description' => 'Sac à dos pratique pour le quotidien.',
                'price' => 39.99,
                'stock' => 40,
                'category' => 'Accessoires',
                'images' => ['accessoire1.jpg']
            ],
            [
                'name' => 'Montre élégante',
                'description' => 'Montre analogique élégante pour toutes occasions.',
                'price' => 89.99,
                'stock' => 30,
                'category' => 'Accessoires',
                'images' => ['accessoire2.jpg']
            ],
            [
                'name' => 'Ceinture en cuir',
                'description' => 'Ceinture en cuir véritable, élégante et durable.',
                'price' => 25.99,
                'stock' => 65,
                'category' => 'Accessoires',
                'images' => ['accessoire3.jpg']
            ],
            [
                'name' => 'Portefeuille classique',
                'description' => 'Portefeuille en cuir avec plusieurs compartiments.',
                'price' => 35.99,
                'stock' => 50,
                'category' => 'Accessoires',
                'images' => ['accessoire4.jpg']
            ],
            [
                'name' => 'Écharpe en laine',
                'description' => 'Écharpe chaude et douce pour l\'hiver.',
                'price' => 19.99,
                'stock' => 80,
                'category' => 'Accessoires',
                'images' => ['accessoire5.jpg']
            ],
            [
                'name' => 'Gants de cuir',
                'description' => 'Gants en cuir élégants pour l\'hiver.',
                'price' => 28.99,
                'stock' => 45,
                'category' => 'Accessoires',
                'images' => ['accessoire6.jpg']
            ],
            [
                'name' => 'Chapeau de soleil',
                'description' => 'Chapeau élégant pour se protéger du soleil.',
                'price' => 15.99,
                'stock' => 70,
                'category' => 'Accessoires',
                'images' => ['accessoire7.jpg']
            ],
            [
                'name' => 'Bracelet en cuir',
                'description' => 'Bracelet en cuir pour un style casual.',
                'price' => 12.99,
                'stock' => 100,
                'category' => 'Accessoires',
                'images' => ['accessoire8.jpg']
            ],
            [
                'name' => 'Lunettes de soleil',
                'description' => 'Lunettes de soleil tendance avec protection UV.',
                'price' => 45.99,
                'stock' => 60,
                'category' => 'Accessoires',
                'images' => ['accessoire9.jpg']
            ],
            [
                'name' => 'Cravate en soie',
                'description' => 'Cravate élégante en soie pour les occasions formelles.',
                'price' => 32.99,
                'stock' => 40,
                'category' => 'Accessoires',
                'images' => ['accessoire10.jpg']
            ],

            // ===== ÉLECTRONIQUES =====
            [
                'name' => 'Smartphone X200',
                'description' => 'Smartphone performant avec écran HD et appareil photo haute résolution.',
                'price' => 299.99,
                'stock' => 70,
                'category' => 'Électroniques',
                'images' => ['electronique1.jpg', 'electronique2.jpg']
            ],
            [
                'name' => 'Casque Bluetooth',
                'description' => 'Casque sans fil avec réduction de bruit active.',
                'price' => 79.99,
                'stock' => 50,
                'category' => 'Électroniques',
                'images' => ['electronique3.jpg']
            ],
            [
                'name' => 'Tablette Pro',
                'description' => 'Tablette performante avec écran Retina et stylet inclus.',
                'price' => 399.99,
                'stock' => 30,
                'category' => 'Électroniques',
                'images' => ['electronique4.jpg']
            ],
            [
                'name' => 'Ordinateur portable',
                'description' => 'Ordinateur portable ultra-léger avec processeur haute performance.',
                'price' => 899.99,
                'stock' => 20,
                'category' => 'Électroniques',
                'images' => ['electronique5.jpg']
            ],
            [
                'name' => 'Écouteurs sans fil',
                'description' => 'Écouteurs bluetooth avec qualité audio exceptionnelle.',
                'price' => 59.99,
                'stock' => 80,
                'category' => 'Électroniques',
                'images' => ['electronique6.jpg']
            ],
            [
                'name' => 'Montre connectée',
                'description' => 'Montre intelligente avec suivi d\'activité et notifications.',
                'price' => 199.99,
                'stock' => 35,
                'category' => 'Électroniques',
                'images' => ['electronique7.jpg']
            ],
            [
                'name' => 'Caméra d\'action',
                'description' => 'Caméra compacte pour capturer vos aventures en haute qualité.',
                'price' => 149.99,
                'stock' => 45,
                'category' => 'Électroniques',
                'images' => ['electronique8.jpg']
            ],
            [
                'name' => 'Haut-parleur portable',
                'description' => 'Haut-parleur bluetooth avec son stéréo et batterie longue durée.',
                'price' => 69.99,
                'stock' => 60,
                'category' => 'Électroniques',
                'images' => ['electronique9.jpg']
            ],
            [
                'name' => 'Chargeur sans fil',
                'description' => 'Chargeur sans fil rapide compatible avec tous les smartphones.',
                'price' => 29.99,
                'stock' => 100,
                'category' => 'Électroniques',
                'images' => ['electronique10.jpg']
            ],
            [
                'name' => 'Webcam HD',
                'description' => 'Webcam haute définition pour les visioconférences.',
                'price' => 49.99,
                'stock' => 75,
                'category' => 'Électroniques',
                'images' => ['electronique11.jpg']
            ],
            [
                'name' => 'Clavier mécanique',
                'description' => 'Clavier gaming avec switches mécaniques et rétroéclairage RGB.',
                'price' => 89.99,
                'stock' => 40,
                'category' => 'Électroniques',
                'images' => ['electronique12.jpg']
            ],
            [
                'name' => 'Souris gaming',
                'description' => 'Souris gaming avec capteur haute précision et boutons programmables.',
                'price' => 39.99,
                'stock' => 65,
                'category' => 'Électroniques',
                'images' => ['electronique13.jpg']
            ],
            [
                'name' => 'Disque dur externe',
                'description' => 'Disque dur externe 1TB pour sauvegarder vos données.',
                'price' => 59.99,
                'stock' => 50,
                'category' => 'Électroniques',
                'images' => ['electronique14.jpg']
            ],
            [
                'name' => 'Câble USB-C',
                'description' => 'Câble USB-C haute vitesse pour tous vos appareils.',
                'price' => 9.99,
                'stock' => 200,
                'category' => 'Électroniques',
                'images' => ['electronique15.jpg']
            ],
        ];

        foreach ($productsData as $data) {
            $product = Product::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'price' => $data['price'],
                'stock' => $data['stock'],
                'category_id' => $categories[$data['category']]->id,
            ]);
            
            foreach ($data['images'] as $index => $img) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'path' => 'images/' . $img,
                    'is_primary' => $index === 0,
                    'order' => $index
                ]);
            }
        }
    }
}
