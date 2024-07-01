<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'nama' => 'Admin',
            'id_level' => '1',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        User::factory()->create([
            'nama' => 'Operator',
            'id_level' => '2',
            'email' => 'operator@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        User::factory()->create([
            'nama' => 'Kepsek',
            'id_level' => '3',
            'email' => 'kepsek@gmail.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
