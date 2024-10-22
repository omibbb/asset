<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat role terlebih dahulu memanfaatkan spatie
        Role::firstOrCreate(['name' => 'supadmin']);
        Role::firstOrCreate(['name' => 'staff']);

        // Membuat user dengan role supadmin
        $supadmin = User::firstOrCreate(
            [
                'email' => 'alifryuuofficial@gmail.com',
                'username' => 'alifryuu',
            ],
            [
                'name' => 'Alif Ryuu',
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'depart' => 'IT',
            ]
        );

        $supadmin->assignRole('supadmin');

        // Membuat user dengan role staff
        $staff = User::firstOrCreate(
            [
                'email' => 'bimo.derry@inteko.co.id',
                'username' => 'bimo',
            ],
            [
                'name' => 'Bimo Dery',
                'email_verified_at' => now(),
                'password' => bcrypt('Suksesmuli4!'),
                'depart' => 'IT',
            ]
        );

        $staff->assignRole('supadmin');

        // Membuat user dengan role staff
        $hrga = User::firstOrCreate(
            [
                'email' => 'hrga.internship@gmail.com',
                'username' => 'INTEKO',
            ],
            [
                'name' => 'INTEKO',
                'email_verified_at' => now(),
                'password' => bcrypt('Suksesmuli4!'),
                'depart' => 'HRGA',
            ]
        );

        $hrga->assignRole('supadmin');
    }
}
