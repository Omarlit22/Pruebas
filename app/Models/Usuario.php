<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'correo_institucional',
        'fecha_nacimiento',
        'cargo_institucion',
        'ci',
        'celular',
    ];

    // Aquí puedes agregar tus métodos de modelo
}
