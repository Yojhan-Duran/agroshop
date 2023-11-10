<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['IDCampesino', 'NombreProducto', 'Descripcion', 'Precio', 'Categoria', 'Disponibilidad'];

    public function campesino()
    {
        return $this->belongsTo(Usuario::class, 'IDCampesino');
    }

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'Productos_Pedidos', 'IDProducto', 'IDPedido')
            ->withPivot('Cantidad');
    }
    
}
