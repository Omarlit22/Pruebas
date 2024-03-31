<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;
    protected $table = 'aulas';
    
    protected $primaryKey = 'idAulas'; 
    
    public $timestamps = false; 
    
    protected $fillable = [
        'nombre',
        'capacidad',
        'data',
        'tipo_aula',
        'pizarra',
        'imagen', 
        'wifi',
    ];
    
}
