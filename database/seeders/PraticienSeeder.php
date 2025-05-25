<?php

namespace Database\Seeders;

use App\Models\Praticien;
use Illuminate\Database\Seeder;

class PraticienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Praticien::factory()
        ->count(15)
        ->create();
    }
}
