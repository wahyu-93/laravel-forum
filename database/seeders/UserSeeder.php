<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'  => 'Wahyu',
            'email' => 'wahyu@beeforum.com',
            'password' => bcrypt('wahyu12345'),
            'image' => 'https://ui-avatars.com/api/?rounded=true&name=wahyu' 
        ]);
    }
}
