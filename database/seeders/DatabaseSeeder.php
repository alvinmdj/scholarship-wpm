<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Criteria;
use Illuminate\Support\Str;
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

        \App\Models\Student::factory(20)->create();

        User::create([
            'name' => 'Petugas',
            'username' => 'admin',
            'email' => 'admin@google.com',
            'email_verified_at' => now(),
            'password' => '$2a$12$2ds/.21RXnN3Np8w9YJ1K.c.UHOnKR/DyohA7vGKYgbe0xxZR5jnC', // password
            'remember_token' => Str::random(10),
        ]);

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
