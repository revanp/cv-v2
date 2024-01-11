<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Revan Pratama',
            'email' => 'revanp0@gmail.com',
            'password' => bcrypt('yendo4ever'),
        ]);
    }
}
