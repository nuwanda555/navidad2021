<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Cita;
use App\Models\Doctor;
use App\Models\Paciente;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CitaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cita::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $horaInicio=config('app.hora_inicio');
        $horaFin=config('app.hora_fin');
        $duracionCita=config('app.duracion_cita');

        $fecha=$this->faker->dateTimeBetween('-1 months', '+3 months');
        $hora=randomHora($horaInicio, $horaFin, $duracionCita);

        $fechaHora=$fecha->format('Y-m-d').' '.$hora;

        return [
            'paciente_id' => Paciente::all()->random()->id,
            'doctor_id' => Doctor::all()->random()->id,
            'fecha_hora' => $fechaHora,
            'confirmada' => random_int(1,5)==5 ? $fechaHora : null, //algunas veces se confirma
            'codigo' => Str::uuid(),
        ];
    }

}
