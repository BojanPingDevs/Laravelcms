<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Bojan Pesovski',
            'email' => 'bojan@hotmail.com',
            'password' => bcrypt('temp12345'),
            'role_id' => rand(1,3)
        ]);

        User::create([
            'name' => 'Local Administrator',
            'email' => 'bojan@hotmail.com',
            'password' => bcrypt('temp12345'),
            'role_id' => 1
        ]);
    }
}
