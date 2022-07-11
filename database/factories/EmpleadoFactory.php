<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'apellido' => $this->faker->lastName(),
            'nombres' => $this->faker->firstName(),
            'numero_documento' => $this->faker->numerify('###########'),
            'telefono' => $this->faker->phoneNumber(),
            'correo' => $this->faker->email(),
            ];
    }
}
