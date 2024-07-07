<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        foreach ($products as $product)
        {
            for ($i = 0;$i < 5;$i++)
            {
                $product->details()->create([
                    'product_id' => $product->id,
                    'color' => fake()->colorName(),
                    'size' => fake()->randomNumber(1),
                    'price' => fake()->randomNumber(5),
                ]);
            }

        }
    }
}
