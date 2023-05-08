<?php

namespace App\Http\Controllers;


use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::with('categoria')->get();
        return response()->json(['data' => $produtos]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'categoria_id'      => 'required|integer|exists:categorias,id',
                'codigo'            => 'required|string|unique:produtos',
                'nome'              => 'required|string',
                'preco'             => 'required|numeric|min:0',
                'preco_promocional' => 'nullable|numeric|min:0',
                'ativo'             => 'required|boolean',
            ]);

            $produto = Produto::create($request->all());
            return response()->json(['message' => 'Produto criado com sucesso!', 'data' => $produto], 201);

        } catch (ValidationException $e) {
            return response()->json(['message' => 'Erro na validação dos dados', 'errors' => $e->errors()], 422);
        }
    }

    public function show(Produto $produto)
    {
        return response()->json(['data' => $produto->load('categoria')]);
    }

    public function update(Request $request, Produto $produto)
    {
        try {
            $request->validate([
                'categoria_id'      => 'required|integer|exists:categorias,id',
                'codigo'            => 'required|string|unique:produtos,codigo,' . $produto->id,
                'nome'              => 'required|string',
                'preco'             => 'required|numeric|min:0',
                'preco_promocional' => 'nullable|numeric|min:0',
                'ativo'             => 'required|boolean',
            ]);

            $produto->update($request->all());
            return response()->json(['message' => 'Produto atualizado com sucesso!', 'data' => $produto], 200);

        } catch (ValidationException $e) {
            return response()->json(['message' => 'Erro na validação dos dados', 'errors' => $e->errors()], 422);
        }
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return response()->json(['message' => 'Produto excluído com sucesso!'], 204);
    }
}
