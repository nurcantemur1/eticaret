<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $woman=Category::create(
            ['name' => 'Woman Collection','image'=>'images/women.jpg', 'description' => 'Woman', 'slug' => 'productsWoman', 'sub_category' => null]
        );
        $men =Category::create(
            ['name' => 'Men Collection','image'=>'images/men.jpg', 'description' => 'Men', 'slug' => 'productsMen', 'sub_category' => null]
        );
        $children=Category::create(
            ['name' => 'Children Collection', 'image'=>'images/children.jpg','description' => 'Children', 'slug' => 'productsChildren', 'sub_category' => null]
        );
        Category::create(
            ['name' => 'Woman Bags','image'=>'images/women.jpg', 'description' => 'Bag', 'slug' => 'productsWomanBag', 'sub_category' => $woman->id]
        );
        Category::create(
            ['name' => 'Men Bags','image'=>'images/women.jpg', 'description' => 'Bag', 'slug' => 'productsMenBag', 'sub_category' => $men->id]
        );
        Category::create(
            ['name' => 'Children Bags','image'=>'images/women.jpg','description' => 'Bag', 'slug' => 'productsChildrenBag', 'sub_category' => $children->id]
        );
        Category::create(
            ['name' => 'Woman Clothes','image'=>'images/women.jpg','description' => 'Clothes', 'slug' => 'productsWomanClothes', 'sub_category' => $woman->id]
        );
        Category::create(
            ['name' => 'Men Clothes','image'=>'images/women.jpg','description' => 'Clothes', 'slug' => 'productsMenClothes', 'sub_category' => $men->id]
        );
        Category::create(
            ['name' => 'Children Clothes','image'=>'images/women.jpg','description' => 'Clothes', 'slug' => 'productsChildrenClothes', 'sub_category' => $children->id]
        );
        Category::create(
            ['name' => 'Woman Shoes','image'=>'images/women.jpg','description' => 'Shoes', 'slug' => 'productsWomanShoes', 'sub_category' => $woman->id]
        );
        Category::create(
            ['name' => 'Men Shoes','image'=>'images/women.jpg','description' => 'Shoes', 'slug' => 'productsMenShoes', 'sub_category' => $men->id]
        );
        Category::create(
            ['name' => 'Children Shoes','image'=>'images/women.jpg','description' => 'Shoes', 'slug' => 'productsChildrenShoes', 'sub_category' => $children->id]
        );
    }
}
