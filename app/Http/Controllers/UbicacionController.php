<?php

namespace App\Http\Controllers;

use App\Models\Ubicacion;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json([
            'data' => Ubicacion::all()
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
        try {
            //code...
            //crear una nueva ubicacion
            // validar los datos
            $request->validate([
                'nombre' => 'required|string|unique:ubicaciones,nombre,',
            ]);

            $ubicacion = Ubicacion::create($request->all());
            return response()->json([
            'dato' => $ubicacion,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'Error al crear la ubicacion',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        // mostrar una ubicacion
        $ubicacion = Ubicacion::find($id);
        return response()->json([
            'dato' => $ubicacion,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ubicacion $ubicacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // actualizar una ubicacion
            // validar los datos
            $request->validate([
                'nombre' => 'string|unique:ubicaciones,nombre,'
            ]);
            $ubicacion = Ubicacion::find($id);
            $ubicacion->update($request->all());
            return response()->json([
                'dato' => $ubicacion,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'Error al actualizar la ubicacion',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // eliminar una ubicacion
        $ubicacion = Ubicacion::find($id);
        $ubicacion->delete();
        return response()->json([
            'mensaje' => 'Ubicacion eliminada correctamente',
        ]);
    }
}
