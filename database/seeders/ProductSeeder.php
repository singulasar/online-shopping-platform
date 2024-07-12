<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'title' => 'Smartphone X',
                'description' => 'The latest smartphone with advanced features and long battery life.',
                'price' => 599.99,
                'image_url' => 'https://via.placeholder.com/300x300/ADD8E6/000000?text=Smartphone+X',
            ],
            [
                'title' => 'Laptop Pro',
                'description' => 'High-performance laptop for professionals and gamers.',
                'price' => 1299.99,
                'image_url' => 'https://via.placeholder.com/300x300/98FB98/000000?text=Laptop+Pro',
            ],
            [
                'title' => 'Wireless Earbuds',
                'description' => 'True wireless earbuds with noise cancellation and great sound quality.',
                'price' => 149.99,
                'image_url' => 'https://via.placeholder.com/300x300/FFB6C1/000000?text=Wireless+Earbuds',
            ],
            [
                'title' => 'Smart Watch',
                'description' => 'Feature-packed smartwatch with health tracking and notifications.',
                'price' => 249.99,
                'image_url' => 'https://via.placeholder.com/300x300/FFD700/000000?text=Smart+Watch',
            ],
            [
                'title' => '4K Ultra HD TV',
                'description' => '55-inch 4K TV with HDR and smart features.',
                'price' => 799.99,
                'image_url' => 'https://via.placeholder.com/300x300/20B2AA/000000?text=4K+Ultra+HD+TV',
            ],
            [
                'title' => 'Bluetooth Speaker',
                'description' => 'Portable Bluetooth speaker with 360-degree sound and waterproof design.',
                'price' => 79.99,
                'image_url' => 'https://via.placeholder.com/300x300/FFA07A/000000?text=Bluetooth+Speaker',
            ],
            [
                'title' => 'Gaming Console',
                'description' => 'Next-gen gaming console for immersive gaming experiences.',
                'price' => 499.99,
                'image_url' => 'https://via.placeholder.com/300x300/9370DB/000000?text=Gaming+Console',
            ],
            [
                'title' => 'Digital Camera',
                'description' => 'High-resolution digital camera with interchangeable lenses.',
                'price' => 699.99,
                'image_url' => 'https://via.placeholder.com/300x300/FA8072/000000?text=Digital+Camera',
            ],
            [
                'title' => 'Wireless Mouse',
                'description' => 'Ergonomic wireless mouse with programmable buttons.',
                'price' => 39.99,
                'image_url' => 'https://via.placeholder.com/300x300/D3D3D3/000000?text=Wireless+Mouse',
            ],
            [
                'title' => 'External SSD',
                'description' => '1TB external SSD for fast data transfer and storage.',
                'price' => 129.99,
                'image_url' => 'https://via.placeholder.com/300x300/87CEFA/000000?text=External+SSD',
            ],
        ];        

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
