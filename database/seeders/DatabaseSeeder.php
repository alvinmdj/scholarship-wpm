<?php

namespace Database\Seeders;

use App\Models\Criteria;
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
        // \App\Models\User::factory(10)->create();

        Criteria::create([
            'nama_kriteria' => 'IPK',
            'bobot' => 2,
            'is_beneficial' => true
        ]);
        Criteria::create([
            'nama_kriteria' => 'Peningkatan prestasi akademik',
            'bobot' => 3,
            'is_beneficial' => true
        ]);
        Criteria::create([
            'nama_kriteria' => 'Pendapatan orang tua',
            'bobot' => 2,
            'is_beneficial' => false
        ]);
        Criteria::create([
            'nama_kriteria' => 'Jumlah saudara kandung yang dibiayai',
            'bobot' => 1,
            'is_beneficial' => true
        ]);
        Criteria::create([
            'nama_kriteria' => 'Biaya hidup per bulan',
            'bobot' => 2,
            'is_beneficial' => true
        ]);
    }
}
