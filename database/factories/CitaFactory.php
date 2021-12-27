<?php

namespace Database\Factories;

use App\Models\Cita;
use App\Models\Doctor;
use App\Models\Paciente;
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
        return [
            'paciente_id' => Paciente::all()->random()->id,
            'doctor_id' => Doctor::all()->random()->id,
            'fecha_hora' => $this->faker->dateTimeBetween('-1 years', '+1 years'),
        ];
    }
}
