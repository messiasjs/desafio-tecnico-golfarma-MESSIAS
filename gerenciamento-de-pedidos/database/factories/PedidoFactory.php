<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'price' => $this->faker->randomFloat(2, 10, 500), // Gera um valor aleatório entre 10 e 500 com duas casas decimais.
            'status' => $this->faker->randomElement(['Pendente', 'Em andamento', 'Concluído']),
        ];
    }
}
