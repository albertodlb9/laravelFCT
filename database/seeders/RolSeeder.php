<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $rols = [
             'admin'=>"Administrador del sistema",
             'teacher'=>"Profesor",
             'pupil'=>"Alumno",
             'tutor'=>"Tutor del alumno en la empresa",
          ];

        foreach ($rols as $rol=>$description) {
             \App\Models\Rol::create([
                 'name' => $rol,
                 'description' => $description,
             ]);
         }
    }
}
