<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //admin el primer usuario adminitrador del sistema
        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@local.lo',
            'password' => bcrypt('admin'),
            'surname1' => 'del sistema'
        ]);
        //profesor
        \App\Models\User::create([
            'name' => 'manolillo',
            'email' => 'manolillo@local.lo',
            'password' => bcrypt('manolillo'),
            'surname1' => 'el profe'
        ]);
        //alumno
        \App\Models\User::create([
            'name' => 'pepito',
            'email' => 'pepito@local.lo',
            'password' => bcrypt('pepito'),
            'surname1' => 'el alumno'
        ]);
        //tutor
        \App\Models\User::create([
            'name' => 'tutor',
            'email' => 'tutor@empresa.com',
            'password' => bcrypt('tutor'),
            'surname1' => 'el tutor'
        ]);

    }
}
