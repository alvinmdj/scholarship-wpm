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
        \App\Models\User::factory(10)->create();

        \App\Models\Student::factory(20)->create();

        Criteria::create([
            'nama_kriteria' => 'IPK',
            'bobot' => 4,
            'is_beneficial' => true
        ]);
        Criteria::create([
            'nama_kriteria' => 'IPS',
            'bobot' => 4,
            'is_beneficial' => true
        ]);
        Criteria::create([
            'nama_kriteria' => 'Pendapatan orang tua',
            'bobot' => 3,
            'is_beneficial' => false
        ]);
        Criteria::create([
            'nama_kriteria' => 'Jumlah saudara kandung yang dibiayai',
            'bobot' => 2,
            'is_beneficial' => true
        ]);
    }
}
