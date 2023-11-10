<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Usuario extends Model
{
    // Constantes para los tipos de usuario
    const TIPO_VENDEDOR = 'Vendedor';
    const TIPO_COMPRADOR = 'Comprador';

    protected $fillable = ['Nombre', 'CorreoElectronico', 'Contraseña', 'TipoUsuario'];

    // Relaciones con Productos y Pedidos
    public function productosComoCampesino()
    {
        return $this->hasMany(Producto::class, 'IDCampesino');
    }

    public function pedidosComoComprador()
    {
        return $this->hasMany(Pedido::class, 'IDComprador');
    }

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }

    // Método para verificar si un usuario es un vendedor
    public function esVendedor()
    {
        return $this->TipoUsuario === self::TIPO_VENDEDOR;
    }
}