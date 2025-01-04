<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Bouncer;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'nom' => 'Admin',
            'prenom' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('adminadmin'),
        ]);

        $praticien = User::create([
            'nom' => 'Praticien',
            'prenom' => 'Praticien',
            'email' => 'praticien@gmail.com',
            'password' => Hash::make('praticien'),
        ]);


        Bouncer::allow('admin')->to([
            'absence-restore',
        ]);

        Bouncer::allow('praticien')->to([
            'absence-restore',
        ]);


        Bouncer::assign('admin')->to($admin);

        Bouncer::assign('praticien')->to($praticien);

        User::factory()
            ->count(15)
            ->create();

    }
}
