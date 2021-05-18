<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\NotificacionesController;
use App\Http\UsuariosController;
use Illuminate\Support\Facades\Auth;
use App\Models\Notificacion;

use Illuminate\Support\Facades\DB;

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

Route::get('/logout', function (Request $request) {

    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login');

})->name("logout");

// NOTIFICACIONES //
Route::get('/notificaciones', [App\Http\Controllers\NotificacionesController::class, 'index']);
Route::get('/misnotificaciones', [App\Http\Controllers\NotificacionesController::class, 'mias']);
Route::get('/notificaciones/crear', [App\Http\Controllers\NotificacionesController::class, 'create']);
Route::post('/notificaciones/crear', [App\Http\Controllers\NotificacionesController::class, 'store']);
Route::get('/notificaciones/actualizar/{id}/{cambio}', [App\Http\Controllers\NotificacionesController::class, 'update']);
//Route::get('/verNotificacion', [App\Http\Controllers\NotificacionesController::class, 'ver']);
Route::get('/notificaciones/{id}', [App\Http\Controllers\NotificacionesController::class, 'show']);

// EQUIPO //
Route::get('/equipo', [App\Http\Controllers\UsuariosController::class, 'index']);

// AUTENTICACIÓN
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');