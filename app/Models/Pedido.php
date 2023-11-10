<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = ['IDComprador', 'FechaHoraPedido', 'EstadoPedido'];

    public function comprador()
    {
        return $this->belongsTo(Usuario::class, 'IDComprador');
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'Productos_Pedidos', 'IDPedido', 'IDProducto')
            ->withPivot('Cantidad');
    }
}
