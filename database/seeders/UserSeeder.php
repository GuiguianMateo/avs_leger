<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Silber\Bouncer\BouncerFacade as Bouncer;

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

        User::create([
            'nom' => 'User',
            'prenom' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('useruser'),
        ]);

        Bouncer::assign('admin')->to($admin);
        Bouncer::assign('praticien')->to($praticien);



        $users = [
            ['nom' => 'Martin', 'prenom' => 'Jean', 'naissance' => '1985-03-15', 'genre' => 'Masculin', 'email' => 'jean.martin@email.com', 'password' => Hash::make('azerty1234')],
            ['nom' => 'Dubois', 'prenom' => 'Marie', 'naissance' => '1990-07-22', 'genre' => 'Feminin', 'email' => 'marie.dubois@email.com', 'password' => Hash::make('azerty1234')],
            ['nom' => 'Bernard', 'prenom' => 'Pierre', 'naissance' => '1978-11-08', 'genre' => 'Masculin', 'email' => 'pierre.bernard@email.com', 'password' => Hash::make('azerty1234')],
            ['nom' => 'Petit', 'prenom' => 'Sophie', 'naissance' => '1995-01-30', 'genre' => 'Feminin', 'email' => 'sophie.petit@email.com', 'password' => Hash::make('azerty1234')],
            ['nom' => 'Durand', 'prenom' => 'Lucas', 'naissance' => '1982-09-14', 'genre' => 'Masculin', 'email' => 'lucas.durand@email.com', 'password' => Hash::make('azerty1234')],
            ['nom' => 'Leroy', 'prenom' => 'Emma', 'naissance' => '1988-12-05', 'genre' => 'Feminin', 'email' => 'emma.leroy@email.com', 'password' => Hash::make('azerty1234')],
            ['nom' => 'Moreau', 'prenom' => 'Antoine', 'naissance' => '1975-06-18', 'genre' => 'Masculin', 'email' => 'antoine.moreau@email.com', 'password' => Hash::make('azerty1234')],
            ['nom' => 'Simon', 'prenom' => 'Camille', 'naissance' => '1992-04-25', 'genre' => 'Feminin', 'email' => 'camille.simon@email.com', 'password' => Hash::make('azerty1234')],
            ['nom' => 'Laurent', 'prenom' => 'Thomas', 'naissance' => '1980-10-12', 'genre' => 'Masculin', 'email' => 'thomas.laurent@email.com', 'password' => Hash::make('azerty1234')],
            ['nom' => 'Michel', 'prenom' => 'Julie', 'naissance' => '1993-08-07', 'genre' => 'Feminin', 'email' => 'julie.michel@email.com', 'password' => Hash::make('azerty1234')],
            ['nom' => 'Garcia', 'prenom' => 'Nicolas', 'naissance' => '1987-02-14', 'genre' => 'Masculin', 'email' => 'nicolas.garcia@email.com', 'password' => Hash::make('azerty1234')],
            ['nom' => 'David', 'prenom' => 'Laura', 'naissance' => '1991-11-29', 'genre' => 'Feminin', 'email' => 'laura.david@email.com', 'password' => Hash::make('azerty1234')],
            ['nom' => 'Bertrand', 'prenom' => 'Maxime', 'naissance' => '1984-05-03', 'genre' => 'Masculin', 'email' => 'maxime.bertrand@email.com', 'password' => Hash::make('azerty1234')],
            ['nom' => 'Roux', 'prenom' => 'Sarah', 'naissance' => '1989-09-16', 'genre' => 'Feminin', 'email' => 'sarah.roux@email.com', 'password' => Hash::make('azerty1234')],
            ['nom' => 'Vincent', 'prenom' => 'Julien', 'naissance' => '1976-01-21', 'genre' => 'Masculin', 'email' => 'julien.vincent@email.com', 'password' => Hash::make('azerty1234')],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
