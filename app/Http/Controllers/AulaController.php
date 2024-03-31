<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;
class AulaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'capacidad' => 'required|integer|min:0', // La capacidad debe ser un entero no negativo
        ]);
        $aula = new Aula;

        $aula->nombre = $request->nombre;
        $aula->capacidad = $request->capacidad;
        $aula->data = $request->data === 'true' ? 1 : 0; // Convertir 'true' a 1 y 'false' a 0
        $aula->tipo_aula = $request->tipo_aula;
        $aula->pizarra = $request->pizarra === 'true' ? 1 : 0; // Convertir 'true' a 1 y 'false' a 0
        $aula->wifi = $request->wifi === 'true' ? 1 : 0; // Convertir 'true' a 1 y 'false' a 0
        $aula->imagen = $request->imagen;

        $aula->save();
    }
}
