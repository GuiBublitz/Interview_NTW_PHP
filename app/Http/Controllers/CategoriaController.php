<?php

namespace App\Http\Controllers;


use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return response()->json(['data' => $categorias]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nome' => 'required|string|unique:categorias',
            ]);

            $categoria = Categoria::create($request->only('nome'));
            return response()->json(['message' => 'Categoria criada com sucesso!', 'data' => $categoria], 201);

        } catch (ValidationException $e) {
            return response()->json(['message' => 'Erro na validação dos dados', 'errors' => $e->errors()], 422);
        }
    }

    public function show(Categoria $categoria)
    {
        return response()->json(['data' => $categoria]);
    }

    public function update(Request $request, Categoria $categoria)
    {
        try {
            $request->validate([
                'nome' => 'required|string|unique:categorias,nome,' . $categoria->id,
            ]);

            $categoria->update($request->only('nome'));
            return response()->json(['message' => 'Categoria atualizada com sucesso!', 'data' => $categoria], 200);

        } catch (ValidationException $e) {
            return response()->json(['message' => 'Erro na validação dos dados', 'errors' => $e->errors()], 422);
        }
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return response()->json(['message' => 'Categoria excluída com sucesso!'], 204);
    }
}
