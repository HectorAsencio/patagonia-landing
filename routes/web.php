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

// INICIO DE SESIÓN (GET)
Route::get('/login', function () {
    return view('login');
})->name("login");

// INICIO DE SESIÓN (POST)
Route::post('/login', function (Request $request) {

    $email = $request->input('email');
    $password = $request->input('password');

    $userFound = DB::table('usuarios')->where('email', $email)->where('password', $password)->first();

    if ($userFound) {

        $request->session()->put('email', $email);
        $request->session()->put('nombre', $userFound->nombre);
        $request->session()->put('avatar', $userFound->avatar);

        return redirect('/notificaciones');
    }
    else {
        return "Váyase de NotifyBoard";
    }

})->name("login");

// ELIMINAR DATOS DE SESIÓN
Route::get('/logout', function (Request $request) {

    $request->session()->flush();

    return redirect('/login');
})->name("logout");

// NOTIFICACIONES //
// LISTADO
Route::get('/notificaciones', function (Request $request)
{
    $sesionArray = array('nombre' => $request->session()->get('nombre', 'Sin sesión'),'email' => $request->session()->get('email', 'Sin sesión'),'avatar' => $request->session()->get('avatar', 'Sin sesión'));
    $sesionData = new ArrayObject($sesionArray);

    $notificaciones =  DB::table('notificaciones')->get();

    return view('notificaciones', ['notificaciones' => $notificaciones, 'sesionData' => $sesionData]);

});

//Route::get('notificaciones', [NotificacionesController::class, 'index']);

// EQUIPO //
// LISTADO
Route::get('/equipo', function (Request $request) 
{
    $sesionArray = array('nombre' => $request->session()->get('nombre', 'Sin sesión'),'email' => $request->session()->get('email', 'Sin sesión'),'avatar' => $request->session()->get('avatar', 'Sin sesión'));
    $sesionData = new ArrayObject($sesionArray);

    $team =  DB::table('usuarios')->get();

    return view('equipo', ['team' => $team, 'sesionData' => $sesionData]);
});

//Route::get('equipo', [UsuariosController::class, 'listaEquipo']);


//CONFIGURACION//

Route::get('/configuracion', function () {
    return view('configuracion');
});