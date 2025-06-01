<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prescription;

class PrescriptionSeeder extends Seeder
{
    public function run(): void
    {
        $prescriptions = [
            [
                'posologie' => '3 medicament(s) par jour',
                'quantite' => 21,
                'duree' => 7,
                'detail' => 'Prendre le comprimé après les repas',
                'consultation_id' => 1,
                'medicament_id' => 1,
            ],
            [
                'posologie' => '3 medicament(s) par jour',
                'quantite' => 8,
                'duree' => 4,
                'detail' => 'Prendre 1 comprimé matin et soir en cas de douleur',
                'consultation_id' => 1,
                'medicament_id' => 2,
            ],
            [
                'posologie' => '2 medicament(s) par jour',
                'quantite' => 14,
                'duree' => 7,
                'detail' => 'Traitement antibiotique complet',
                'consultation_id' => 2,
                'medicament_id' => 3,
            ],
            [
                'posologie' => '1 medicament(s) par jour',
                'quantite' => 30,
                'duree' => 30,
                'detail' => 'Prendre 1 comprimé par jour le matin à jeun',
                'consultation_id' => 2,
                'medicament_id' => 4,
            ],
            [
                'posologie' => '4 medicament(s) par jour',
                'quantite' => 8,
                'duree' => 2,
                'detail' => 'En cas de fièvre élevée, maximum 4 par jour',
                'consultation_id' => 5,
                'medicament_id' => 5,
            ],
            [
                'posologie' => '1 medicament(s) pour 30 jour',
                'quantite' => 1,
                'duree' => 30,
                'detail' => '1 à 2 bouffées en cas de crise d\'asthme',
                'consultation_id' => 5,
                'medicament_id' => 7,
            ],
            [
                'posologie' => '1 medicament(s) par jour',
                'quantite' => 14,
                'duree' => 14,
                'detail' => 'Traitement anti-inflammatoire, comprimé journalier',
                'consultation_id' => 6,
                'medicament_id' => 8,
            ],
        ];

        foreach ($prescriptions as $prescription) {
            Prescription::create($prescription);
        }
    }
}
