<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // \App\Models\User::factory(300)->create();
        // \App\Models\Tamlik::factory(500000)->create();

        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'is_admin' => 1,
            'password' => Hash::make('00000000'),
        ]);

        \App\Models\User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('00000000'),
        ]);
    }
}
