<?php

namespace App\Http\Controllers;

use App\Models\Recarga;
use Illuminate\Http\Request;

class RecargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // mostrar todas las recargas
        return response()->json([
            'data' => Recarga::all()
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
        // crear una nueva recarga
        // validar los datos
        try {
            $request->validate([
                'idextintor' => 'required|exists:extintors,id',
                'fecha' => 'required|date',
                'proximarecarga' => 'required|date',
            ]);

            $recarga = Recarga::create($request->all());
            return response()->json([
                'dato' => $recarga,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'Error al crear la recarga',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // mostrar una recarga
        $recarga = Recarga::find($id);
        return response()->json([
            'dato' => $recarga,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recarga $recarga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // actualizar una recarga
        try {
            // validar los datos
            $request->validate([
                'idextintor' => 'exists:extintors,id',
                'fecha' => 'date',
                'proximarecarga' => 'date',
            ]);

            $recarga = Recarga::find($id);
            $recarga->update($request->all());
            return response()->json([
                'dato' => $recarga,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'Error al actualizar la recarga',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // eliminar una recarga
        $recarga = Recarga::find($id);
        $recarga->delete();
        return response()->json([
            'mensaje' => 'Recarga eliminada correctamente',
        ]);
    }
}
