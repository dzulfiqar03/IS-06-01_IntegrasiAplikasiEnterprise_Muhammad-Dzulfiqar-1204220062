<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            DB::table('books')->insert([
                'judul' => $faker->sentence(3), // judul buku random
                'pengarang' => $faker->name, // nama pengarang random
                'penerbit' => $faker->company, // nama penerbit random
                'tahun_terbit' => $faker->year, // tahun terbit random
                'jumlah_halaman' => $faker->numberBetween(100, 500), // halaman antara 100-500
                'isbn' => $faker->unique()->numerify('############'), // 12 digit angka
                'status' => $faker->randomElement(['tersedia', 'dipinjam']), // status acak
                'created_at' => $faker->dateTimeBetween('-2 years', 'now'),
                'updated_at' => $faker->dateTimeBetween('-2 years', 'now'),


            ]);
        }
    }
}
