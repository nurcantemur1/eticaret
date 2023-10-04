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
            ['name' => 'Woman Collection', 'description' => 'Woman', 'slug' => 'productsWoman', 'sub_category' => null]
        );
        $men =Category::create(
            ['name' => 'Men Collection', 'description' => 'Men', 'slug' => 'productsMen', 'sub_category' => null]
        );
        $children=Category::create(
            ['name' => 'Children Collection', 'description' => 'Children', 'slug' => 'productsChildren', 'sub_category' => null],
        );
        Category::create(
            ['name' => 'Woman Bags', 'description' => 'Bag', 'slug' => 'productsWomanBag', 'sub_category' => $woman->id],
        );
        Category::create(
            ['name' => 'Men Bags', 'description' => 'Bag', 'slug' => 'productsMenBag', 'sub_category' => $men->id],
        );
        Category::create(
            ['name' => 'Children Bags', 'description' => 'Bag', 'slug' => 'productsChildrenBag', 'sub_category' => $children->id],
        );
        Category::create(
            ['name' => 'Woman Clothes', 'description' => 'Clothes', 'slug' => 'productsWomanClothes', 'sub_category' => $woman->id],
        );
        Category::create(
            ['name' => 'Men Clothes', 'description' => 'Clothes', 'slug' => 'productsMenClothes', 'sub_category' => $men->id],
        );
        Category::create(
            ['name' => 'Children Clothes', 'description' => 'Clothes', 'slug' => 'productsChildrenClothes', 'sub_category' => $children->id],
        );
        Category::create(
            ['name' => 'Woman Shoes', 'description' => 'Shoes', 'slug' => 'productsWomanShoes', 'sub_category' => $woman->id],
        );
        Category::create(
            ['name' => 'Men Shoes', 'description' => 'Shoes', 'slug' => 'productsMenShoes', 'sub_category' => $men->id],
        );
        Category::create(
            ['name' => 'Children Shoes', 'description' => 'Shoes', 'slug' => 'productsChildrenShoes', 'sub_category' => $children->id],
        );
    }
}
