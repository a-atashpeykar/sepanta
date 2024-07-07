<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Arash',
            'email' => 'a@gmail.com',
            'password' => '1'
        ]);

         Product::factory(6)->create();
         $this->call(ProductDetailsSeeder::class);

    }
}
