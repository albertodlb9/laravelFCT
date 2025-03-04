<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\Action::create([
            'date' => '2021-01-01',
            'description' => 'Martilleé tres discos duros y un pendrive',
            'interval'=>3,
            'user_id' => 4
        ]);
        \App\Models\Action::create([
            'date' => '2021-01-01',
            'description' => 'Reinstalé el sistema operativo en un portátil',
            'interval'=>1.5,
            'user_id' => 4
        ]);
        \App\Models\Action::create([
            'date' => '2021-01-01',
            'description' => 'Arregle una impresora',
            'interval'=> 2,
            'user_id' => 5
        ]);
    }
}
