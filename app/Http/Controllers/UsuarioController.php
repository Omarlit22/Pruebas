<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo_institucional' => 'required|email|unique:usuarios,correo_institucional',
            'fecha_nacimiento' => 'required|date',
            'cargo_institucion' => 'required',
            'ci' => 'required|unique:usuarios,ci',
            'celular' => 'nullable|numeric'
        ]);

        Usuario::create($request->all());

        return redirect()->route('usuarios.create')->with('success', 'Tu solicitud de registro ha sido enviada con éxito. Revisa tu correo electrónico para futuras comunicaciones respecto a tu solicitud');
    }
}
