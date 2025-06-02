<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Consultation;
use Carbon\Carbon;

class ConsultationSeeder extends Seeder
{
    public function run(): void
    {
       $consultations = [
            ['date_consultation' => Carbon::now()->subDays(5)->setTime(9, 30),  'retard' => false, 'statu' => 'valide', 'type_id' => 1,  'user_id' => 1,  'praticien_id' => 1],
            ['date_consultation' => Carbon::now()->subDays(3)->setTime(14, 15), 'retard' => false, 'statu' => 'valide', 'type_id' => 2,  'user_id' => 2,  'praticien_id' => 2],
            ['date_consultation' => Carbon::now()->subDays(1)->setTime(11, 0),  'retard' => false, 'statu' => 'attente','type_id' => 3,  'user_id' => 3,  'praticien_id' => 3],
            ['date_consultation' => Carbon::now()->addDays(2)->setTime(10, 30),  'retard' => false, 'statu' => 'attente','type_id' => 4,  'user_id' => 4,  'praticien_id' => 4],
            ['date_consultation' => Carbon::now()->subDays(7)->setTime(16, 45), 'retard' => true,  'statu' => 'valide', 'type_id' => 5,  'user_id' => 5,  'praticien_id' => 5],
            ['date_consultation' => Carbon::now()->addDays(1)->setTime(13, 20),  'retard' => false, 'statu' => 'attente','type_id' => 6,  'user_id' => 6,  'praticien_id' => 6],
            ['date_consultation' => Carbon::now()->subDays(10)->setTime(8, 45), 'retard' => false, 'statu' => 'rejete', 'type_id' => 3,  'user_id' => 7,  'praticien_id' => 7],
            ['date_consultation' => Carbon::now()->subDays(2)->setTime(15, 0),  'retard' => true,  'statu' => 'valide', 'type_id' => 3,  'user_id' => 8,  'praticien_id' => 8],
            ['date_consultation' => Carbon::now()->addDays(3)->setTime(9, 15),  'retard' => false, 'statu' => 'attente','type_id' => 3,  'user_id' => 9,  'praticien_id' => 10],
            ['date_consultation' => Carbon::now()->subDays(6)->setTime(12, 30), 'retard' => true,  'statu' => 'valide', 'type_id' => 5, 'user_id' => 10, 'praticien_id' => 18],
            ['date_consultation' => Carbon::now()->subDays(4)->setTime(17, 20), 'retard' => true,  'statu' => 'valide', 'type_id' => 3,  'user_id' => 11, 'praticien_id' => 14],
            ['date_consultation' => Carbon::now()->addDays(4)->setTime(8, 0),   'retard' => false, 'statu' => 'attente','type_id' => 3,  'user_id' => 12, 'praticien_id' => 15],
            ['date_consultation' => Carbon::now()->subDays(8)->setTime(14, 45), 'retard' => false, 'statu' => 'valide', 'type_id' => 1,  'user_id' => 13, 'praticien_id' => 13],
            ['date_consultation' => Carbon::now()->subDays(1)->setTime(10, 0),  'retard' => false, 'statu' => 'attente','type_id' => 2,  'user_id' => 14, 'praticien_id' => 12],
            ['date_consultation' => Carbon::now()->addDays(5)->setTime(16, 30), 'retard' => false, 'statu' => 'attente','type_id' => 3,  'user_id' => 15, 'praticien_id' => 19],
            ['date_consultation' => Carbon::now()->subDays(12)->setTime(11, 15),'retard' => false, 'statu' => 'rejete', 'type_id' => 4,  'user_id' => 1,  'praticien_id' => 11],
        ];


        foreach ($consultations as $consultation) {
            Consultation::create($consultation);
        }
    }
}
