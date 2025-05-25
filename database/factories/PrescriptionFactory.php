<?php

namespace Database\Factories;

use App\Models\Consultation;
use App\Models\Medicament;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prescription>
 */
class PrescriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'detail' => $this->faker->realTextBetween(25, 250),
            'duree' => $this->faker->numberBetween(1, 30),
            'quantite' => $this->faker->numberBetween(1, 100),
            'ratio' => function (array $attributes) {
                $duree = $attributes['duree'];
                $quantite = $attributes['quantite'];
                $nbprjour = round($quantite / $duree, 1);

                return $nbprjour .' medicaments par jour';

            },
            'consultation_id' => Consultation::factory()->create()->id,
            'medicament_id' => Medicament::factory()->create()->id,
        ];
    }
}
