<?php

namespace Tests\Unit;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProdutoTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_fetch_all_produtos()
    {
        $produtos = Produto::factory()->count(5)->create();

        $response = $this->getJson('/api/produtos');
        $response->assertStatus(200)->assertJsonStructure([
            'data' => [
                '*' => [
                    'id', 'categoria_id', 'codigo', 'nome', 'preco', 'preco_promocional', 'ativo', 'created_at', 'updated_at', 'categoria'
                ]
            ]
        ]);
    }

    public function test_it_can_create_a_produto()
    {
        $categoria = Categoria::factory()->create();
        $produtoData = [
            'categoria_id'      => $categoria->id,
            'codigo'            => 'ABC123',
            'nome'              => 'Sample Product',
            'preco'             => 100.0,
            'preco_promocional' => 80.0,
            'ativo'             => true,
        ];

        $response = $this->postJson('/api/produtos', $produtoData);
        $response->assertStatus(201)->assertJsonFragment($produtoData);
    }

    public function test_it_cannot_create_a_produto_with_invalid_data()
    {
        $response = $this->postJson('/api/produtos', []);
        $response->assertStatus(422);
    }

    public function test_it_can_fetch_a_single_produto()
    {
        $produto = Produto::factory()->create();
        $response = $this->getJson('/api/produtos/' . $produto->id);
        $response->assertStatus(200)->assertJsonFragment([
            'id' => $produto->id,
            'categoria_id' => $produto->categoria_id,
            'codigo' => $produto->codigo,
            'nome' => $produto->nome,
            'preco' => $produto->preco,
            'preco_promocional' => $produto->preco_promocional,
            'ativo' => $produto->ativo
        ])->assertJsonStructure(['data' => ['categoria']]);
    }

    public function test_it_can_update_a_produto()
    {
        $produto = Produto::factory()->create();
        $updatedData = [
            'categoria_id'      => $produto->categoria_id,
            'codigo'            => 'XYZ987',
            'nome'              => 'Updated Product',
            'preco'             => 120.0,
            'preco_promocional' => 90.0,
            'ativo'             => false,
        ];

        $response = $this->putJson('/api/produtos/' . $produto->id, $updatedData);
        $response->assertStatus(200)->assertJsonFragment($updatedData);
    }

    public function test_it_cannot_update_a_produto_with_invalid_data()
    {
        $produto = Produto::factory()->create();
        $response = $this->putJson('/api/produtos/' . $produto->id, []);
        $response->assertStatus(422);
    }

    public function test_it_can_delete_a_produto()
    {
        $produto = Produto::factory()->create();
        $response = $this->deleteJson('/api/produtos/' . $produto->id);
        $response->assertStatus(204);
        $this->assertDatabaseMissing('produtos', ['id' => $produto->id]);
    }

    public function test_it_cannot_delete_a_nonexistent_produto()
    {
        $response = $this->deleteJson('/api/produtos/9999');
        $response->assertStatus(404);
    }
}