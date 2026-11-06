<?php

namespace App\GraphQL\Mutations;

use App\Services\ProductoService;

class ProductoMutator
{
    public function __construct(private ProductoService $servicio) {}

    public function crear($_, array $args)
    {
        return $this->servicio->crear($args);
    }

    public function stock($_, array $args)
    {
        $producto = $this->servicio->buscar((int) $args['id']);

        return $this->servicio->cambiarStock($producto, (int) $args['stock']);
    }
}
