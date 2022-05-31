<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Configuration;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'aswarkasim',
            'email' => 'aswarkasim@gmail.com',
            'role' => 'superadmin',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'mahasiswa',
            'email' => 'mahasiswa@gmail.com',
            'role' => 'mahasiswa',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'dosen',
            'email' => 'dosen@gmail.com',
            'role' => 'dosen',
            'password' => bcrypt('password')
        ]);

        Configuration::create([
            'app_name' => 'LDPPGUNM'
        ]);
    }
}
