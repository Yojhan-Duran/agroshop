<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function store(Request $request)
    {
        // Validación de datos
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'correo_electronico' => 'required|email|unique:usuarios|max:255',
            'contraseña' => 'required|string|min:6',
        ]);
    
        // Manejar errores de validación
        if ($validator->fails()) {
            return redirect('ruta_del_formulario')
                ->withErrors($validator)
                ->withInput();
        }
    
        // Crear el usuario si la validación pasa
        Usuario::create([
            'nombre' => $request->input('nombre'),
            'correo_electronico' => $request->input('correo_electronico'),
            'contraseña' => bcrypt($request->input('contraseña')),
        ]);
    
        // Redireccionar o hacer otras acciones después de la creación exitosa
        return redirect('ruta_despues_de_la_creacion');
    }
    public function mostrarInformacion($id)
    {
        $usuario = Usuario::find($id);

        if ($usuario->esVendedor()) {
            // Lógica específica para vendedores
            return view('vendedores.show', compact('usuario'));
        } else {
            // Lógica específica para compradores
            return view('compradores.show', compact('usuario'));
        }
    }
    public function show($id)
    {
        $usuario = Usuario::find($id);
        return view('usuarios.show', compact('usuario'));
    }
}
