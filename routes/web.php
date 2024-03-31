<?php

use App\Http\Controllers\AulaController;
use App\Http\Controllers\UbicacionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('Ambientes');
});
Route::post('/aula',[AulaController::class, 'store'])->name('aula.store');



// Ruta para mostrar el formulario de registro de usuarios
Route::get('/usuarios/registro', [UsuarioController::class, 'create'])->name('usuarios.create');

// Ruta para procesar el formulario de registro
Route::post('/usuarios/registro', [UsuarioController::class, 'store'])->name('usuarios.store');