<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Praticien;

class PraticienSeeder extends Seeder
{
    public function run(): void
    {
        $praticiens = [
            ['nom' => 'Dr. Leclerc', 'job' => 'Dentiste', 'type_id' => 1],
            ['nom' => 'Dr. Moreau', 'job' => 'Pédiatre', 'type_id' => 2],
            ['nom' => 'Dr. Simon', 'job' => 'Cardiologue', 'type_id' => 3],
            ['nom' => 'Dr. Laurent', 'job' => 'Dermatologue', 'type_id' => 4],
            ['nom' => 'Dr. Roux', 'job' => 'Ophtalmologue', 'type_id' => 5],
            ['nom' => 'Dr. Faure', 'job' => 'Gynécologue', 'type_id' => 6],
            ['nom' => 'Dr. Girard', 'job' => 'Neurologue', 'type_id' => 7],
            ['nom' => 'Dr. Bonnet', 'job' => 'Orthopédiste', 'type_id' => 8],
            ['nom' => 'Dr. Dupont', 'job' => 'Psychiatre', 'type_id' => 9],
            ['nom' => 'Dr. Martin', 'job' => 'ORL', 'type_id' => 10],
            ['nom' => 'Dr. Durand', 'job' => 'Radiologue', 'type_id' => 11],
            ['nom' => 'Dr. Bernard', 'job' => 'Urgentiste', 'type_id' => 12],
            ['nom' => 'Dr. Leroy', 'job' => 'Dentiste', 'type_id' => 1],
            ['nom' => 'Dr. Michel', 'job' => 'Pédiatre', 'type_id' => 2],
            ['nom' => 'Dr. Garcia', 'job' => 'Cardiologue', 'type_id' => 3],
            ['nom' => 'Dr. David', 'job' => 'Dermatologue', 'type_id' => 4],
            ['nom' => 'Dr. Bertrand', 'job' => 'Ophtalmologue', 'type_id' => 5],
            ['nom' => 'Dr. Vincent', 'job' => 'Gynécologue', 'type_id' => 6],
            ['nom' => 'Dr. Petit', 'job' => 'Neurologue', 'type_id' => 7],
            ['nom' => 'Dr. Rousseau', 'job' => 'Orthopédiste', 'type_id' => 8],
            ['nom' => 'Dr. Blanc', 'job' => 'Psychiatre', 'type_id' => 9],
            ['nom' => 'Dr. Guerin', 'job' => 'ORL', 'type_id' => 10],
            ['nom' => 'Dr. Muller', 'job' => 'Radiologue', 'type_id' => 11],
            ['nom' => 'Dr. Lefebvre', 'job' => 'Urgentiste', 'type_id' => 12],
        ];

        foreach ($praticiens as $praticien) {
            Praticien::create($praticien);
        }
    }
}
