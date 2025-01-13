<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        (new TypeSeeder)->run();
        (new UserSeeder)->run();
        (new PraticienSeeder)->run();
        (new ConsultationSeeder)->run();
        (new MedicamentSeeder)->run();
        (new PrescriptionSeeder)->run();
        (new PrescriptionMedicamentSeeder)->run();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
