<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // mostrar todos los proveedores
        return response()->json([
            'data' => Proveedor::all()
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
            // crear un nuevo proveedor
            // validar los datos
            $request->validate([
                'nombre' => 'required|string|unique:proveedores,nombre,',
                'telefono' => 'required|numeric',
                'correo' => 'required|email',
            ]);
    
            $proveedor = Proveedor::create($request->all());
            return response()->json([
                'dato' => $proveedor,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'Error al crear el proveedor',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // mostrar un proveedor
        $proveedor = Proveedor::find($id);
        return response()->json([
            'dato' => $proveedor,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // actualizar un proveedor
        try {
            // validar los datos
            $request->validate([
                'nombre' => 'string|unique:proveedores,nombre,',
                'telefono' => 'numeric',
                'correo' => 'email',
            ]);

            $proveedor = Proveedor::find($id);
            $proveedor->update($request->all());
            return response()->json([
                'dato' => $proveedor,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'mensaje' => 'Error al actualizar el proveedor',
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // eliminar un proveedor
        $proveedor = Proveedor::find($id);
        $proveedor->delete();
        return response()->json([
            'mensaje' => 'Proveedor eliminado correctamente',
        ]);

    }
}
