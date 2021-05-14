<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\NotificacionesController;
use App\Http\UsuariosController;

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

// USUARIOS (LOGIN) //
Route::get('usuarios', [UsuariosController::class, 'index']);

// ELIMINAR DATOS DE SESIÓN
Route::get('/logout', function (Request $request) {

    $request->session()->flush();
    return redirect('/');

})->name("logout");

// NOTIFICACIONES //
// LISTADO
Route::get('/notificaciones', function (Request $request)
{
    $sesionArray = array('nombre' => $request->session()->get('nombre', 'Sin sesión'),'email' => $request->session()->get('email', 'Sin sesión'),'avatar' => $request->session()->get('avatar', 'Sin sesión'));
    $sesionData = new ArrayObject($sesionArray);

    $notificaciones =  DB::table('notificaciones')->get();

    return view('notificaciones', ['notificaciones' => $notificaciones, 'sesionData' => $sesionData]);

})->name("notificaciones");

// CREAR NOTIFICACIÓN (GET)
Route::get('/notificaciones/crear', function () {

    $users =  DB::table('users')->get();

    return view('crearNotificacion', ['users' => $users]);
})->name("crearNotificacion");

// EQUIPO //
// LISTADO
Route::get('/equipo', function (Request $request) 
{
    $sesionArray = array('nombre' => $request->session()->get('nombre', 'Sin sesión'),'email' => $request->session()->get('email', 'Sin sesión'),'avatar' => $request->session()->get('avatar', 'Sin sesión'));
    $sesionData = new ArrayObject($sesionArray);

    $team =  DB::table('users')->get();

    return view('equipo', ['team' => $team, 'sesionData' => $sesionData]);
});

//Route::get('equipo', [UsuariosController::class, 'listaEquipo']);


//CONFIGURACION//

Route::get('/configuracion', function () {
    return view('configuracion');
});

// AUTENTICACIÓN
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');