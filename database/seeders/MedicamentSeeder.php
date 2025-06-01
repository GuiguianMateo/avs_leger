<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medicament;

class MedicamentSeeder extends Seeder
{
    public function run(): void
    {
        $medicaments = [
            ['nom' => 'Paracétamol', 'effet_indesirable' => 'Rares troubles digestifs, réactions allergiques possibles', 'mode_administration' => 'Voie orale', 'niveau_avertissement' => 'Niveau 1'],
            ['nom' => 'Ibuprofène', 'effet_indesirable' => 'Troubles digestifs, maux de tête, vertiges', 'mode_administration' => 'Voie orale', 'niveau_avertissement' => 'Niveau 2'],
            ['nom' => 'Amoxicilline', 'effet_indesirable' => 'Diarrhée, nausées, réactions allergiques', 'mode_administration' => 'Voie orale', 'niveau_avertissement' => 'Niveau 2'],
            ['nom' => 'Aspirine', 'effet_indesirable' => 'Troubles digestifs, risque hémorragique', 'mode_administration' => 'Voie orale', 'niveau_avertissement' => 'Niveau 2'],
            ['nom' => 'Doliprane', 'effet_indesirable' => 'Rares réactions allergiques', 'mode_administration' => 'Voie orale', 'niveau_avertissement' => 'Niveau 1'],
            ['nom' => 'Morphine', 'effet_indesirable' => 'Somnolence, constipation, dépression respiratoire', 'mode_administration' => 'Injection ou voie orale', 'niveau_avertissement' => 'Niveau 3'],
            ['nom' => 'Ventoline', 'effet_indesirable' => 'Tremblements, palpitations, maux de tête', 'mode_administration' => 'Inhalation', 'niveau_avertissement' => 'Niveau 2'],
            ['nom' => 'Cortisone', 'effet_indesirable' => 'Prise de poids, troubles du sommeil, fragilité osseuse', 'mode_administration' => 'Voie orale', 'niveau_avertissement' => 'Niveau 3'],
            ['nom' => 'Oméprazole', 'effet_indesirable' => 'Maux de tête, diarrhée, nausées', 'mode_administration' => 'Voie orale', 'niveau_avertissement' => 'Niveau 1'],
            ['nom' => 'Lorazépam', 'effet_indesirable' => 'Somnolence, confusion, dépendance possible', 'mode_administration' => 'Voie orale', 'niveau_avertissement' => 'Niveau 3'],
            ['nom' => 'Metformine', 'effet_indesirable' => 'Troubles digestifs, acidose lactique rare', 'mode_administration' => 'Voie orale', 'niveau_avertissement' => 'Niveau 2'],
            ['nom' => 'Atorvastatine', 'effet_indesirable' => 'Douleurs musculaires, troubles hépatiques', 'mode_administration' => 'Voie orale', 'niveau_avertissement' => 'Niveau 2'],
            ['nom' => 'Citalopram', 'effet_indesirable' => 'Nausées, troubles du sommeil, vertiges', 'mode_administration' => 'Voie orale', 'niveau_avertissement' => 'Niveau 2'],
            ['nom' => 'Tramadol', 'effet_indesirable' => 'Somnolence, nausées, constipation', 'mode_administration' => 'Voie orale', 'niveau_avertissement' => 'Niveau 3'],
            ['nom' => 'Cetirizine', 'effet_indesirable' => 'Somnolence légère, sécheresse buccale', 'mode_administration' => 'Voie orale', 'niveau_avertissement' => 'Niveau 1'],
            ['nom' => 'Fluticasone', 'effet_indesirable' => 'Irritation nasale, saignements de nez', 'mode_administration' => 'Spray nasal', 'niveau_avertissement' => 'Niveau 1'],
            ['nom' => 'Warfarine', 'effet_indesirable' => 'Risque hémorragique élevé, ecchymoses', 'mode_administration' => 'Voie orale', 'niveau_avertissement' => 'Niveau 3'],
            ['nom' => 'Prednisolone', 'effet_indesirable' => 'Prise de poids, hypertension, ostéoporose', 'mode_administration' => 'Voie orale', 'niveau_avertissement' => 'Niveau 3'],
            ['nom' => 'Salbutamol', 'effet_indesirable' => 'Tremblements, tachycardie, nervosité', 'mode_administration' => 'Inhalation', 'niveau_avertissement' => 'Niveau 2'],
            ['nom' => 'Amlodipine', 'effet_indesirable' => 'Œdème des chevilles, rougeurs, fatigue', 'mode_administration' => 'Voie orale', 'niveau_avertissement' => 'Niveau 2'],
            ['nom' => 'Codéine', 'effet_indesirable' => 'Constipation, somnolence, dépendance', 'mode_administration' => 'Voie orale', 'niveau_avertissement' => 'Niveau 3'],
            ['nom' => 'Lansoprazole', 'effet_indesirable' => 'Maux de tête, diarrhée, vertiges', 'mode_administration' => 'Voie orale', 'niveau_avertissement' => 'Niveau 1'],
            ['nom' => 'Diclofénac', 'effet_indesirable' => 'Troubles digestifs, risque cardiovasculaire', 'mode_administration' => 'Voie orale ou topique', 'niveau_avertissement' => 'Niveau 2'],
            ['nom' => 'Levothyroxine', 'effet_indesirable' => 'Palpitations, insomnie, perte de poids', 'mode_administration' => 'Voie orale', 'niveau_avertissement' => 'Niveau 2'],
        ];

        foreach ($medicaments as $medicament) {
            Medicament::create($medicament);
        }
    }
}
