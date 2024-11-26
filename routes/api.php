<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuditoriaController;
use App\Http\Controllers\SupervisionController;
use App\Http\Controllers\SancionController;
use App\Http\Controllers\AsesoriaController;
use App\Http\Controllers\DenunciaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Ruta para probar si la API está funcionando
Route::get('/ping', function () {
    return response()->json(['message' => 'API funcionando correctamente'], 200);
});

/*
|--------------------------------------------------------------------------
| Rutas para Usuarios
|--------------------------------------------------------------------------
*/
Route::resource('usuarios', UsuarioController::class)->only(['index', 'store', 'show', 'update', 'destroy']);

/*
|--------------------------------------------------------------------------
| Rutas para Auditorías
|--------------------------------------------------------------------------
*/
Route::resource('auditorias', AuditoriaController::class)->only(['index', 'store', 'show', 'update', 'destroy']);

/*
|--------------------------------------------------------------------------
| Rutas para Supervisiones
|--------------------------------------------------------------------------
*/
Route::resource('supervisiones', SupervisionController::class)->only(['index', 'store', 'show', 'update', 'destroy']);

/*
|--------------------------------------------------------------------------
| Rutas para Sanciones
|--------------------------------------------------------------------------
*/
Route::resource('sanciones', SancionController::class)->only(['index', 'store', 'show', 'update', 'destroy']);

/*
|--------------------------------------------------------------------------
| Rutas para Asesorías
|--------------------------------------------------------------------------
*/
Route::resource('asesorias', AsesoriaController::class)->only(['index', 'store', 'show', 'update', 'destroy']);

/*
|--------------------------------------------------------------------------
| Rutas para Denuncias
|--------------------------------------------------------------------------
*/
Route::resource('denuncias', DenunciaController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
