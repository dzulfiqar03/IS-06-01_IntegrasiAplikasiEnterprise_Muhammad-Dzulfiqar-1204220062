<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'LAPTOP ASUS ROG',
                'description' => 'RTX4060',
                'price' => 15000000,
                'Stock' => 10,
                'Category' => 'Electronics',
            ],
            [
                'name' => 'Mouse Logitech G502',
                'description' => 'Gaming Mouse',
                'price' => 15000000,
                'Stock' => 10,
                'Category' => 'Electronics',
            ],
        ];

        // masukkan data ke tabel products
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
