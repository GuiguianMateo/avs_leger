<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Praticien;

class PraticienSeeder extends Seeder
{
    public function run(): void
    {
        $praticiens = [
            ['nom' => 'Dr. Leclerc',   'job' => 'Dentiste',             'type_id' => 1],
            ['nom' => 'Dr. Moreau',    'job' => 'Pédiatre',             'type_id' => 2],
            ['nom' => 'Dr. Simon',     'job' => 'Médecin généraliste',  'type_id' => 3],
            ['nom' => 'Dr. Laurent',   'job' => 'Dermatologue',         'type_id' => 4],
            ['nom' => 'Dr. Roux',      'job' => 'Ophtalmologue',        'type_id' => 5],
            ['nom' => 'Dr. Faure',     'job' => 'Gynécologue',          'type_id' => 6],
            ['nom' => 'Dr. Girard',    'job' => 'Médecin généraliste',  'type_id' => 3],
            ['nom' => 'Dr. Bonnet',    'job' => 'Médecin généraliste',  'type_id' => 3],
            ['nom' => 'Dr. Dupont',    'job' => 'ORL',                  'type_id' => 7],
            ['nom' => 'Dr. Martin',    'job' => 'Médecin généraliste',  'type_id' => 3],
            ['nom' => 'Dr. Durand',    'job' => 'Dermatologue',         'type_id' => 4],
            ['nom' => 'Dr. Bernard',   'job' => 'Pédiatre',             'type_id' => 2],
            ['nom' => 'Dr. Leroy',     'job' => 'Dentiste',             'type_id' => 1],
            ['nom' => 'Dr. Michel',    'job' => 'Médecin généraliste',  'type_id' => 3],
            ['nom' => 'Dr. Garcia',    'job' => 'Médecin généraliste',  'type_id' => 3],
            ['nom' => 'Dr. David',     'job' => 'Gynécologue',          'type_id' => 6],
            ['nom' => 'Dr. Bertrand',  'job' => 'ORL',                  'type_id' => 7],
            ['nom' => 'Dr. Vincent',   'job' => 'Ophtalmologue',        'type_id' => 5],
            ['nom' => 'Dr. Petit',     'job' => 'Médecin généraliste',  'type_id' => 3],
            ['nom' => 'Dr. Rousseau',  'job' => 'Médecin généraliste',  'type_id' => 3],
            ['nom' => 'Dr. Blanc',     'job' => 'Pédiatre',             'type_id' => 2],
            ['nom' => 'Dr. Guerin',    'job' => 'Dermatologue',         'type_id' => 4],
            ['nom' => 'Dr. Muller',    'job' => 'Médecin généraliste',  'type_id' => 3],
            ['nom' => 'Dr. Lefebvre',  'job' => 'Gynécologue',          'type_id' => 6],
        ];

        foreach ($praticiens as $praticien) {
            Praticien::create($praticien);
        }
    }
}
