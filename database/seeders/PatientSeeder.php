<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Patient::create([
            'name' => 'John',
            'address' => 'Jl. Merak',
            'phone' => '1234567',
            'hospital_id' => 12
        ]);

        Patient::create([
            'name' => 'Jane',
            'address' => 'Jl. Merak',
            'phone' => '1324576',
            'hospital_id' => 12
        ]);

        Patient::create([
            'name' => 'David',
            'address' => 'Jl. Gagak',
            'phone' => '1423765',
            'hospital_id' => 12
        ]);

        Patient::create([
            'name' => 'Alex',
            'address' => 'Jl. Gagak',
            'phone' => '5673412',
            'hospital_id' => 12
        ]);

        Patient::create([
            'name' => 'Sarah',
            'address' => 'Jl. Japati',
            'phone' => '3541276',
            'hospital_id' => 12
        ]);

        Patient::create([
            'name' => 'Michael',
            'address' => 'Jl. Japati',
            'phone' => '6354712',
            'hospital_id' => 12
        ]);
    }
}
