<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['nom' => 'Dentaire',         'duree' => 180],
            ['nom' => 'Pédiatrique',      'duree' => 90],
            ['nom' => 'Médecine courante', 'duree' => 365],
            ['nom' => 'Dermatologique',   'duree' => 365],
            ['nom' => 'Ophtalmologique',  'duree' => 730],
            ['nom' => 'Gynécologique',    'duree' => 365],
            ['nom' => 'ORL',              'duree' => 730],
        ];

        foreach ($types as $type) {
            Type::create($type);
        }
    }
}
