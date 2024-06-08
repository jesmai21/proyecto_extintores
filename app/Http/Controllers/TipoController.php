<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // mostrar todos los tipos
        return response()->json([
            'data' => Tipo::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // crear un nuevo tipo
        // validar los datos
        try {
            $request->validate([
                'nombre' => 'required|string|unique:tipos,nombre,',
            ]);

            $tipo = Tipo::create($request->all());
            return response()->json([
                'dato' => $tipo,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'Error al crear el tipo',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // mostrar un tipo
        $tipo = Tipo::find($id);
        return response()->json([
            'dato' => $tipo,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tipo $tipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // actualizar un tipo
        try {
            // validar los datos
            $request->validate([
                'nombre' => 'string|unique:tipos,nombre,'
            ]);
            
            $tipo = Tipo::find($id);
            $tipo->update($request->all());
            return response()->json([
                'dato' => $tipo,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'Error al actualizar el tipo',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // eliminar un tipo
        $tipo = Tipo::find($id);
        $tipo->delete();
        return response()->json([
            'mensaje' => 'Tipo eliminado exitosamente',
        ]);
    }
}
