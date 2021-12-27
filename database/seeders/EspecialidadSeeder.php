<?php

namespace Database\Seeders;

use App\Models\Especialidad;
use Illuminate\Database\Seeder;

class EspecialidadSeeder extends Seeder
{
    protected $faker;

    public function run()
    {
        //crear 10 especialidades
        Especialidad::factory(1)->create([
            'especialidad' => 'Pediatría',
        ]);
        Especialidad::factory(1)->create([
            'especialidad' => 'Oftalmología',
        ]);
        Especialidad::factory(1)->create([
            'especialidad' => 'Cardiología',
        ]);
        Especialidad::factory(1)->create([
            'especialidad' => 'Ginecología',
        ]);
        Especialidad::factory(1)->create([
            'especialidad' => 'Neurología',
        ]);
        Especialidad::factory(1)->create([
            'especialidad' => 'Otorrinolaringología',
        ]);
        Especialidad::factory(1)->create([
            'especialidad' => 'Urología',
        ]);
        Especialidad::factory(1)->create([
            'especialidad' => 'Dermatología',
        ]);
        Especialidad::factory(1)->create([
            'especialidad' => 'Odontología',
        ]);
        

    }
}
