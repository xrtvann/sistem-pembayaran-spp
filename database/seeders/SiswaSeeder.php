<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 200; $i++) {
            DB::table('siswa')->insert([
                'nis' => 'NIS' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'nisn' => 'NISN' . str_pad($i, 5, '0', STR_PAD_LEFT),
                'nama' => $faker->name,
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date('Y-m-d', '2010-12-31'),
                'alamat' => $faker->address,
                'nama_orang_tua' => $faker->name,
                'no_hp' => $faker->phoneNumber,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
