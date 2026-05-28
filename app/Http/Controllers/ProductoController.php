<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Carga todos los productos para el catálogo de Vue
    public function index()
    {
        return response()->json(Producto::all(), 200);
    }

    // Guarda un producto nuevo
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $producto = Producto::create($validated);
        return response()->json($producto, 201);
    }

    // Muestra un solo producto (para la ruta dinámica /catalogo/:id de la Práctica 3)
    public function show($id)
    {
        $producto = Producto::find($id);
        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
        return response()->json($producto, 200);
    }

    // Actualiza un producto
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $producto->update($request->all());
        return response()->json($producto, 200);
    }

    // Elimina un producto
    public function destroy($id)
    {
        $producto = Producto::find($id);
        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $producto->delete();
        return response()->json(null, 244); // 204 No Content
    }
}