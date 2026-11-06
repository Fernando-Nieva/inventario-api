<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Services\ProductoService;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function __construct(private ProductoService $servicio) {}

    public function index()
    {
        return response()->json(
            $this->servicio->listar(),
            200,
            [],
            JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
        );
    }

    public function store(Request $request)
    {
        $producto = $this->servicio->crear($request->all());

        return response()->json($producto, 201);
    }

    public function show(Producto $producto)
    {
        return response()->json($producto, 200);
    }

    public function update(Request $request, Producto $producto)
    {
        return response()->json(
            $this->servicio->actualizar($producto, $request->all()),
            200
        );
    }

    public function destroy(Producto $producto)
    {
        $this->servicio->eliminar($producto);

        return response()->noContent();
    }
}
