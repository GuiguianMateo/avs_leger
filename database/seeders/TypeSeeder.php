<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['nom' => 'Dentaire',         'duree' => 45],
            ['nom' => 'Pédiatrique',      'duree' => 40],
            ['nom' => 'Médecine courante', 'duree' => 50],
            ['nom' => 'Dermatologique',   'duree' => 30],
            ['nom' => 'Ophtalmologique',  'duree' => 35],
            ['nom' => 'Gynécologique',    'duree' => 40],
            ['nom' => 'ORL',              'duree' => 30],
        ];

        foreach ($types as $type) {
            Type::create($type);
        }
    }
}
