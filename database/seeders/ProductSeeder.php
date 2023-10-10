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
        Product::create(
            ['productName' => 'product1','image'=>'images/cloth_1.jpg', 'categoryId' => '1', 'description' => 'description1', 'size' => 'S', 'price' => 10, 'stock' => 10, 'color' => 'purple']
        );
        Product::create(
            ['productName' => 'product2','image'=>'images/cloth_2.jpg', 'categoryId' => '2', 'description' => 'description2', 'size' => 'M', 'price' => 50, 'stock' => 10, 'color' => 'green']
        );
        Product::create(
            ['productName' => 'product3','image'=>'images/cloth_3.jpg', 'categoryId' => '3', 'description' => 'description3', 'size' => 'L', 'price' => 110, 'stock' => 10, 'color' => 'red']
        );
        Product::create(
            ['productName' => 'product4','image'=>'images/cloth_1.jpg', 'categoryId' => '1', 'description' => 'description4', 'size' => 'L', 'price' => 210, 'stock' => 10, 'color' => 'purple']
        );
        Product::create(
            ['productName' => 'product5','image'=>'images/cloth_2.jpg', 'categoryId' => '2', 'description' => 'description5', 'size' => 'M', 'price' => 310, 'stock' => 10, 'color' => 'blue']
        );
        Product::create(
            ['productName' => 'product6','image'=>'images/cloth_3.jpg', 'categoryId' => '3', 'description' => 'description6', 'size' => 'S', 'price' => 510, 'stock' => 10, 'color' => 'red']
        );
        Product::create(
            ['productName' => 'product7','image'=>'images/cloth_1.jpg', 'categoryId' => '1', 'description' => 'description7', 'size' => 'M', 'price' => 10, 'stock' => 10, 'color' => 'red']
        );
        Product::create(
            ['productName' => 'product8','image'=>'images/cloth_2.jpg', 'categoryId' => '2', 'description' => 'description8', 'size' => 'L', 'price' => 90, 'stock' => 10, 'color' => 'purple']
        );
        Product::create(
            ['productName' => 'product9','image'=>'images/cloth_3.jpg', 'categoryId' => '3', 'description' => 'description9', 'size' => 'S', 'price' => 80, 'stock' => 10, 'color' => 'green']
        );
        Product::create(
            ['productName' => 'product10','image'=>'images/cloth_1.jpg', 'categoryId' => '1', 'description' => 'description10', 'size' => 'M', 'price' => 70, 'stock' => 10, 'color' => 'red']
        );
    }
}
