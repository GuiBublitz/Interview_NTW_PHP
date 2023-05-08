<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produto;
use Carbon\Carbon;

class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produtos = [
            [
                'categoria_id' => 1,
                'codigo' => 'ELE001',
                'nome' => 'Smartphone',
                'preco' => 999.99,
                'preco_promocional' => 799.99,
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'categoria_id' => 2,
                'codigo' => 'ROU001',
                'nome' => 'Camiseta',
                'preco' => 49.99,
                'preco_promocional' => null,
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'categoria_id' => 3,
                'codigo' => 'ACE001',
                'nome' => 'Relógio',
                'preco' => 299.99,
                'preco_promocional' => 249.99,
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'categoria_id' => 4,
                'codigo' => 'LIV001',
                'nome' => 'Livro - A Arte da Guerra',
                'preco' => 19.99,
                'preco_promocional' => null,
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'categoria_id' => 5,
                'codigo' => 'ESP001',
                'nome' => 'Bola de Futebol',
                'preco' => 59.99,
                'preco_promocional' => 49.99,
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'categoria_id' => 6,
                'codigo' => 'CJ001',
                'nome' => 'Faca de Cozinha',
                'preco' => 29.99,
                'preco_promocional' => 19.99,
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'categoria_id' => 7,
                'codigo' => 'AUT001',
                'nome' => 'Óleo de Motor',
                'preco' => 39.99,
                'preco_promocional' => null,
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'categoria_id' => 8,
                'codigo' => 'BRI001',
                'nome' => 'Quebra-cabeça',
                'preco' => 14.99,
                'preco_promocional' => 9.99,
                'ativo' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ];

        Produto::insert($produtos);
    }
}
