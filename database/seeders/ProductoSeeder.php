<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Carga productos de ejemplo para probar REST, GraphQL, Reverb y gRPC.
     */
    public function run(): void
    {
        $productos = [
            ['nombre' => 'Teclado mecánico', 'precio' => 25000, 'stock' => 12],
            ['nombre' => 'Mouse inalámbrico', 'precio' => 18000, 'stock' => 20],
            ['nombre' => 'Monitor 24"', 'precio' => 210000, 'stock' => 5],
        ];

        foreach ($productos as $producto) {
            Producto::firstOrCreate(['nombre' => $producto['nombre']], $producto);
        }
    }
}
