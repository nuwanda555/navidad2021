<?php

namespace Database\Seeders;


use App\Models\Cita;
use App\Models\Doctor;
use App\Models\Paciente;
use App\Models\User;
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
        for ($i = 0; $i < 100; $i++) {
            $doctor = Doctor::factory()->create(); //se crea un doctor con datos al azar
            $user = User::factory()->create(['name' => $doctor->nombre, 'email' => $doctor->email]); //se crea un usuario con los datos del doctor. La contraseña es la misma para todos: password
            $doctor->user()->save($user); //se guarda el tipo de modelo y el id del doctor en la tabla usuarios
        }

        for ($i = 0; $i < 500; $i++) {
            $paciente = Paciente::factory()->create(); //se crea un doctor con datos al azar
            $user = User::factory()->create(['name' => $paciente->nombre, 'email' => $paciente->email]); //se crea un usuario con los datos del paciente. La contraseña es la misma para todos: password
            $paciente->user()->save($user); //se guarda el tipo de modelo y el id del paciente en la tabla usuarios
        }
        Cita::factory(2500)->create();
    }
}
