<?php

namespace App\Http\Controllers;

use App\Models\Inspeccion;
use Illuminate\Http\Request;

class InspeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // mostrar todas las inspecciones
        return response()->json([
            'data' => Inspeccion::all()
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
        // crear una nueva inspeccion
        // validar los datos
        try {
            $request->validate([
                'idextintor' => 'required|exists:extintors,id',
                'fecha' => 'required|date',
                'proximainspeccion' => 'required|date',
            ]);

            $inspeccion = Inspeccion::create($request->all());
            return response()->json([
                'dato' => $inspeccion,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'Error al crear la inspeccion',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // mostrar una inspeccion
        $inspeccion = Inspeccion::find($id);
        return response()->json([
            'dato' => $inspeccion,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inspeccion $inspeccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // actualizar una inspeccion
        try {
            $request->validate([
                'idextintor' => 'exists:extintors,id',
                'fecha' => 'date',
                'proximainspeccion' => 'date',
            ]);

            $inspeccion = Inspeccion::find($id);
            $inspeccion->update($request->all());
            return response()->json([
                'dato' => $inspeccion,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'Error al actualizar la inspeccion',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // eliminar una inspeccion
        $inspeccion = Inspeccion::find($id);
        $inspeccion->delete();
        return response()->json([
            'mensaje' => 'Inspeccion eliminada correctamente',
        ]);
    }
}
