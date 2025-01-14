<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'), // Senha padrão
            'cpf' => $this->faker->numerify('###.###.###-##'),
            'celular' => $this->faker->numerify('9##########'),
            'endereco' => $this->faker->address(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
