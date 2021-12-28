<?php

namespace Database\Factories;

use App\Models\Especialidad;
use Illuminate\Database\Eloquent\Factories\Factory;

class EspecialidadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Especialidad::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "f_alta" => $this->faker->dateTimeBetween('-10 years', 'now'),
            "activa" => random_int(1,5)==5?false:true,
        ];
    }
}
