<?php

namespace App\Events;

use App\Models\Producto;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductoActualizado implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    public array $producto;

    public string $accion;

    public function __construct(Producto $producto, string $accion)
    {
        $this->producto = $producto->only('id', 'nombre', 'precio', 'stock');
        $this->accion = $accion;
    }

    public function broadcastOn(): array
    {
        return [new Channel('inventario')];
    }

    public function broadcastAs(): string
    {
        return 'producto.actualizado';
    }
}
