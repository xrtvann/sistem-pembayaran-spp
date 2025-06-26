<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\SiswaSeeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */


    public function run(): void
    {
        User::factory()->create([
            'name' => 'Irvan',
            'email' => 'ii@gmail.com',
            'role' => 'admin',
        ]);
        $this->call(SiswaSeeder::class);
    }
}
