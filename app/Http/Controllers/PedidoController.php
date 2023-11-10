<?php

namespace App\Http\Controllers;

use App\Models\Pedido;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedidos.index', compact('pedidos'));
    }
    public function show($id)
    {
        $pedido = Pedido::find($id);
        return view('pedidos.show', compact('pedido'));
    }
}