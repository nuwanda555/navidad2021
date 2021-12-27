<?php

namespace Database\Seeders;


use App\Models\Cita;
use App\Models\Doctor;
use App\Models\Paciente;
use Illuminate\Database\Seeder;
use Database\Seeders\EspecialidadSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EspecialidadSeeder::class);
        Doctor::factory(20)->create();
        Paciente::factory(100)->create();
        Cita::factory(500)->create();
    }
}