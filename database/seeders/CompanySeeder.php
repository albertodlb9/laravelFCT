<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\Company::create([
            'name' => 'empresa1',
            'cif' => 'A12345678',
            'address' => 'calle de la empresa 1',
            'tlfn' => '123456789',
            'contact_email' => 'gerente@empresa1.com'
        ]);
        \App\Models\Company::create([
            'name' => 'empresa2',
            'cif' => 'B12345678',
            'address' => 'calle de la empresa 2',
            'tlfn' => '123456789',
            'contact_email' => 'gerente@empresa2.com'
        ]);
    }
}
