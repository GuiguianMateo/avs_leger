<?php

namespace Database\Factories;

use App\Models\Praticien;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consultation>
 */
class ConsultationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_consultation' => $this->faker->date(),
            'retard' => $this->faker->boolean(),
            'type_id' => Type::factory()->create()->id,
            'user_id' => User::factory()->create()->id,
            'praticien_id' => Praticien::factory()->create()->id,
        ];
    }
}
