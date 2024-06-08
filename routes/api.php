<?php

use App\Http\Controllers\ExtintorController;
use App\Http\Controllers\InspeccionController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RecargaController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\UbicacionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// rutas de api
Route::apiResources([
    'ubicaciones' => UbicacionController::class,
    'proveedores' => ProveedorController::class,
    'tipos' => TipoController::class,
    'extintores' => ExtintorController::class,
    'inspecciones' => InspeccionController::class,
    'recargas' => RecargaController::class,
]);