<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\client>
 */
class clientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'equipe_id' => '9999999',
            'corretor' => 'banana',
            'nome_cliente' => $this->faker->name(),
            'celular_cliente'  => Str::random(10),
            'email_cliente' => $this->faker->unique()->safeEmail(),
            'renda_cliente' => Str::random(4),
            'cidade_cliente' => $this->faker->city(),
            'interesse_cliente' => 'casa',
            'bairro_interesse_cliente'  => $this->faker->district(),
            'empreendimento_cliente',
            'fgts_cliente' => Str::random(4),
            'spc_cliente',
            'nivel_cliente' => 'quente',
            'origem_cliente',
            'conversa_cliente' => $this->faker->paragraph(),
            'controle_cliente' => '1',
            'ex_cliente',
        ];
    }
}
