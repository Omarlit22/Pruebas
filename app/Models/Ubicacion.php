<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;
    protected $table = 'localizacion';
    
    protected $primaryKey = 'idUbicacion'; 
    
    public $timestamps = false; 
    
    protected $fillable = [
        'facultad',
        'edificio',
        'nroPiso',
        'ubicacion',
        'idAulas',
    ];
}
