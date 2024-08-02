<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(array(
            'nama' => 'Administrator E-Laundry',
            'tempat_lahir' => 'Bireuen',
            'tanggal_lahir' => '2023-01-01',
            'email' => 'admin@elaundry.com',
            'no_hp' => '',
            'alamat' => 'Bireuen',
            'foto' => 'profil/avatars.png',
            'password' => bcrypt('mantap'),
            'role' => '0',
        ));
    }
}
