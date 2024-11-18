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
        if (!User::where('email', 'gabriel@outlook.com.br')->first()) {
            $superAdmin = User::create([
                'name' => 'Gabriel',
                'email' => 'gabriel@outlook.com.br',
                'password' => Hash::make('123456', ['rounds' => 12])
            ]);
        }
        
    }
}
