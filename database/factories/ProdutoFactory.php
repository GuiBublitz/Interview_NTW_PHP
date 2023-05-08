<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    protected $model = Produto::class;

    public function definition()
    {
        $categoria = Categoria::factory()->create();

        return [
            'categoria_id'      => $categoria->id,
            'codigo'            => $this->faker->unique()->bothify('??###'),
            'nome'              => $this->faker->word,
            'preco'             => $this->faker->randomFloat(2, 1, 1000),
            'preco_promocional' => $this->faker->optional()->randomFloat(2, 1, 1000),
            'ativo'             => $this->faker->boolean(),
        ];
    }
}
