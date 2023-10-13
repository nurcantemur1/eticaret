<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $size = ['S','M','L'];
        return [
            'productName'=>fake()->name(),
            'image'=>fake()->imageUrl(),
            'categoryId'=>random_int(4,12),
            'description'=>fake()->text(),
            'size'=>$size[random_int(0,2)],
            'price'=>random_int(10,510),
            'stock'=>random_int(1,100),
            'color'=>fake()->colorName()
        ];
    }
}
