<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'username' => 'adminweb',
            'password' => bcrypt('password'),
            'is_admin' => 1
        ]);

        User::factory(5)->create();

        Category::create([
            'name' => 'Televisi',
            'slug' => 'televisi'
        ]);

        Category::create([
            'name' => 'Mesin Cuci',
            'slug' => 'mesin-cuci'
        ]);

        Category::create([
            'name' => 'Kulkas',
            'slug' => 'kulkas'
        ]);

        Category::create([
            'name' => 'Radio',
            'slug' => 'radio'
        ]);

        Category::create([
            'name' => 'Coffee Maker',
            'slug' => 'coffee-maker'
        ]);

        Category::create([
            'name' => 'Mesin Fotokopi',
            'slug' => 'mesin-fotokopi'
        ]);

        Product::create([
            'name' => 'TV LG Series A012',
            'slug' => 'tv-lg-series-a012',
            'description' => 'TV keluaran terbaru',
            'stock' => 5,
            'price' => 100000,
        ]);

        Product::create([
            'name' => 'Electrolux Series Z712',
            'slug' => 'electrolux-series-z712',
            'description' => 'Mesin cuci andalan laundry se-Indonesia',
            'stock' => 2,
            'price' => 200000,
        ]);

        Product::create([
            'name' => 'Kulkas Panasonic Series A012',
            'slug' => 'kulkas-panasonic-series-a012',
            'description' => 'Kulkas double door yang bisa menampung semua belanjaan Anda!',
            'stock' => 4,
            'price' => 300000,
        ]);
    }
}
