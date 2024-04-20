<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hospital;


class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Hospital::create([
            'name' => 'Hospital 1',
            'address' => 'Jl. Merak',
            'email' => 'hospital1@example.com',
            'phone' => '1111111'
        ]);

        Hospital::create([
            'name' => 'Hospital 2',
            'address' => 'Jl. Gagak',
            'email' => 'hospital2@example.com',
            'phone' => '2222222'
        ]);

        Hospital::create([
            'name' => 'Hospital 3',
            'address' => 'Jl. Japati',
            'email' => 'hospital3@example.com',
            'phone' => '3333333'
        ]);
    }
}
