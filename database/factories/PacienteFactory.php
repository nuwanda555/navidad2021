<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Paciente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'    => $this->faker->firstname(),
            'apellidos' => $this->faker->lastname(),
            'email'     => $this->faker->email(),
            'f_nacimiento' => $this->faker->date(),
            'telefono'  => $this->faker->phoneNumber(),
        ];
    }
}
