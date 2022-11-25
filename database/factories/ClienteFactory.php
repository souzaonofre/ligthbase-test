<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    protected function gerarPlacaCarro()
    {
        $placaCarro = [];

        for ($i=1; $i <=3; $i++) {
            array_push($placaCarro, strtoupper(fake()->randomLetter()));
        }

        array_push($placaCarro, ' ');

        for ($i=1; $i <=4; $i++) {
            array_push($placaCarro, strval(fake()->randomDigit()));
        }

        return join('', $placaCarro);
    }


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => fake()->unique()->name(),
            'telefone' => fake()->phoneNumber(),
            'cpf' => fake()->randomNumber(11),
            'placa_carro' => $this->gerarPlacaCarro()
        ];
    }
}
