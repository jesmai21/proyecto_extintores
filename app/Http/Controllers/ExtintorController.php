<?php

namespace App\Http\Controllers;

use App\Models\Extintor;
use Illuminate\Http\Request;

class ExtintorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // mostrar todos los extintores
        return response()->json([
            'data' => Extintor::all()
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
        // crear un nuevo extintor
        // validar los datos
        try {
            $request->validate([
                'capacidad' => 'required|numeric',
                'fechafabricacion' => 'required|date',
                'estado' => 'required|string',
                'idtipo' => 'required|exists:tipos,id',
                'idubicacion' => 'required|exists:ubicaciones,id',
                'idproveedor' => 'required|exists:proveedores,id',
            ]);

            $extintor = Extintor::create($request->all());
            return response()->json([
                'dato' => $extintor,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'Error al crear el extintor',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // mostrar un extintor
        $extintor = Extintor::find($id);
        return response()->json([
            'dato' => $extintor,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Extintor $extintor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // actualizar un extintor
        try {
            // validar los datos
            $request->validate([
                'capacidad' => 'numeric',
                'fechafabricacion' => 'date',
                'estado' => 'string',
                'idtipo' => 'exists:tipos,id',
                'idubicacion' => 'exists:ubicaciones,id',
                'idproveedor' => 'exists:proveedores,id',
            ]);

            $extintor = Extintor::find($id);
            $extintor->update($request->all());
            return response()->json([
                'dato' => $extintor,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'Error al actualizar el extintor',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // eliminar un extintor
        $extintor = Extintor::find($id);
        $extintor->delete();
        return response()->json([
            'mensaje' => 'Extintor eliminado exitosamente',
        ]);
    }
}
