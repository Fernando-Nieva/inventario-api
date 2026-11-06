<?php

use App\Http\Controllers\Api\ProductoController;
use App\Http\Middleware\ValidateInternalKey;
use App\Models\Producto;
use Illuminate\Support\Facades\Route;

Route::apiResource('productos', ProductoController::class);

Route::get('/interno/productos/{producto}', function (Producto $producto) {
    return response()->json($producto);
})->middleware(ValidateInternalKey::class);
