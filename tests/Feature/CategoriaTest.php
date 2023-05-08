<?php

namespace Tests\Unit;

use App\Models\Categoria;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriaTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_fetch_all_categorias()
    {
        Categoria::factory()->count(5)->create();

        $response = $this->getJson('/api/categorias');
        $response->assertStatus(200)->assertJsonStructure([
            'data' => [
                '*' => [
                    'id', 'nome', 'created_at', 'updated_at'
                ]
            ]
        ]);
    }

    public function test_it_can_create_a_categoria()
    {
        $categoriaData = [
            'nome' => 'Electronics'
        ];
        $response = $this->postJson('/api/categorias', $categoriaData);
        $response->assertStatus(201)->assertJsonFragment($categoriaData);
    }

    public function test_it_cannot_create_a_categoria_with_invalid_data()
    {
        $response = $this->postJson('/api/categorias', []);
        $response->assertStatus(422);
    }

    public function test_it_can_fetch_a_single_categoria()
    {
        $categoria = Categoria::factory()->create();
        $response = $this->getJson('/api/categorias/' . $categoria->id);
        $response->assertStatus(200)->assertJsonFragment([
            'id' => $categoria->id,
            'nome' => $categoria->nome
        ]);
    }

    public function test_it_can_update_a_categoria()
    {
        $categoria = Categoria::factory()->create();
        $updatedData = [
            'nome' => 'Updated Category'
        ];
        $response = $this->putJson('/api/categorias/' . $categoria->id, $updatedData);
        $response->assertStatus(200)->assertJsonFragment($updatedData);
    }

    public function test_it_cannot_update_a_categoria_with_invalid_data()
    {
        $categoria = Categoria::factory()->create();
        $response = $this->putJson('/api/categorias/' . $categoria->id, []);
        $response->assertStatus(422);
    }

    public function test_it_can_delete_a_categoria()
    {
        $categoria = Categoria::factory()->create();
        $response  = $this->deleteJson('/api/categorias/' . $categoria->id);
        $response->assertStatus(204);
        $this->assertDatabaseMissing('categorias', ['id' => $categoria->id]);
    }

    public function test_it_cannot_delete_a_nonexistent_categoria()
    {
        $response = $this->deleteJson('/api/categorias/9999');
        $response->assertStatus(404);
    }
}
