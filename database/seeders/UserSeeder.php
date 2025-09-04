<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'password' => Hash::make('wahyu12345'),
            'username' => 'wahyu93',
            'image' => 'https://ui-avatars.com/api/?rounded=true&name=wahyu' 
        ]);
    }
}
