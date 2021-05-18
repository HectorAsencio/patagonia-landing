<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// LANDING //
// INICIO
Route::get('/', function () {
    return view('welcome');
});

// SISTEMA WEB //
// NOTIFICACIONES //
Route::get('/notificaciones', [App\Http\Controllers\NotificacionesController::class, 'index'])->middleware('auth')->middleware('noti');
Route::get('/misnotificaciones', [App\Http\Controllers\NotificacionesController::class, 'mias'])->middleware('auth')->middleware('noti');
Route::get('/notificaciones/crear', [App\Http\Controllers\NotificacionesController::class, 'create'])->middleware('auth')->middleware('noti');
Route::post('/notificaciones/crear', [App\Http\Controllers\NotificacionesController::class, 'store'])->middleware('auth')->middleware('noti');
Route::get('/notificaciones/actualizar/{id}/{cambio}', [App\Http\Controllers\NotificacionesController::class, 'update'])->middleware('auth')->middleware('noti');
Route::get('/notificaciones/{id}', [App\Http\Controllers\NotificacionesController::class, 'show'])->middleware('auth')->middleware('noti');

// EQUIPO //
Route::get('/equipo', [App\Http\Controllers\UsuariosController::class, 'index'])->middleware('auth')->middleware('noti');
Route::get('/perfil', [App\Http\Controllers\UsuariosController::class, 'perfil'])->middleware('auth')->middleware('noti');

// AUTENTICACIÓN
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name("logout");
