<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Delphi 7','Code Review','General','PHP','Pemrograman','Microsoft Office','Query Builder','Testing','Server','Vite','Saham'];

        foreach($categories as $category){
            Category::create(['name' => $category]);
        };

    }
}
