<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Especialidad;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Image;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $foto=Str::random(15).".png";
        $img = Image::make("https://thispersondoesnotexist.com/image");
        $img->resize(128, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $filePath = public_path('/fotos');
        $img->save("$filePath/$foto");

        return [
            'nombre'    => $this->faker->firstname(),
            'apellidos' => $this->faker->lastname(),
            'email'     => $this->faker->email(),
            'f_nacimiento' => $this->faker->date(),
            'telefono'  => $this->faker->phoneNumber(),
            'especialidad_id' => Especialidad::all()->random()->id,
            'foto'      => $foto,
        ];
    }
}
