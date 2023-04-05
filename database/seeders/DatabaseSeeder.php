<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'username'=>'haikal',
            'name'=>'haikal',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'email'=>'haikal@gmail.com',

        ]);
        Product::create([
            'nama'=>'Sabun LifeBoy',
            'category_id'=>'1',
            'gambar'=>'wasdasdas',
            'harga'=>'5000',
            'deskripsi'=>'Sabun Lifeboy Netto:100gram',
        ]);
        Product::create([
            'nama'=>'Indomie Goreng',
            'category_id'=>'2',
            'gambar'=>'wasdasdas',
            'harga'=>'3000',
            'deskripsi'=>'Indomie Goreng Netto:250gram',            
        ]);
        Category::create([
            'nama'=>'Bahan Mentah',
        ]);
        Category::create([
            'nama'=>'Makanan',
        ]);
        Category::create([
            'nama'=>'Minuman',
        ]);


    }
}
