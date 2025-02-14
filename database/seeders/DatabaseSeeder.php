<?php

namespace Database\Seeders;


use App\Models\Rol;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /* User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
        $this->call([
            RolSeeder::class,
            UserSeeder::class,
            CompanySeeder::class,
            ActionSeeder::class
        ]);
        // El alumno pepito tiene el rol pupil en la  empresa1
        $user = User::where('name', 'pepito')->first();
        $user->companies()->attach(1, ['rol_id' => Rol::where('name', 'pupil')->first()->id]);
        // El tutor tutor tiene el rol tutor en la empresa2
        $user = User::where('name', 'tutor')->first();
        $user->companies()->attach(2, ['rol_id' => Rol::where('name', 'tutor')->first()->id]);
        // El profesor manolillo tiene el rol teacher en la empresa1
        $user = User::where('name', 'manolillo')->first();
        $user->rols()->attach(2, ['company_id' => 1]);


    }
}
