<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;
use Carbon\Carbon;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['nome' => 'Eletrônicos',         'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nome' => 'Roupas',              'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nome' => 'Acessórios',          'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nome' => 'Livros',              'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nome' => 'Esportes',            'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nome' => 'Casa e Jardim',       'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nome' => 'Automóveis',          'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nome' => 'Brinquedos',          'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nome' => 'Alimentos e Bebidas', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nome' => 'Saúde e Beleza',      'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        Categoria::insert($categorias);
    }
}
