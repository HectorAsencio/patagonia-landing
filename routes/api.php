<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Notificacion;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::middleware('auth:api')->get('/user/me', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/equipo', [App\Http\Controllers\UsuariosController::class, 'equipoTrabajo']);

Route::middleware('auth:api')->get('/notificaciones/mias/{userId}', [App\Http\Controllers\NotificacionesController::class, 'NotiUsuario']);

Route::middleware('auth:api')->get('/notificaciones/bandeja/{userId}', [App\Http\Controllers\NotificacionesController::class, 'NotiBandeja']);

Route::middleware('auth:api')->get('/notificaciones/notificacion/{notiId}/{accion}', [App\Http\Controllers\NotificacionesController::class, 'Actualizar']);

Route::middleware('auth:api')->get('/notificaciones/crear', [App\Http\Controllers\NotificacionesController::class, 'createAPI']);
Route::middleware('auth:api')->post('/notificaciones/crear', [App\Http\Controllers\NotificacionesController::class, 'crear']);

Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact info@website.com'], 404);
});