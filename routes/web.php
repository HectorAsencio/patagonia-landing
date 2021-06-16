<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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
})->middleware('noti');

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
Route::get('/perfil/{id}', [App\Http\Controllers\UsuariosController::class, 'perfil'])->middleware('auth')->middleware('noti');
Route::get('/perfil/avatar/{nuevoAvatar}', [App\Http\Controllers\UsuariosController::class, 'nuevoAvatar'])->middleware('auth')->middleware('noti');
Route::get('/ayuda/{id}', [App\Http\Controllers\UsuariosController::class, 'ayuda'])->middleware('auth')->middleware('noti');

//DASHBOARD
Route::get('/dashboard', [App\Http\Controllers\NotificacionesController::class, 'dashboard'])->middleware('auth')->middleware('noti');

// AUTENTICACIÓN
Auth::routes();
Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name("logout");

Route::get('/upload', function () {
    return view('upload');
})->middleware('noti');

Route::post('/upload', function (Request $request) {

    $datosInvalidos = false;

    $file = request()->file('upload');

    if($file->guessExtension()=="pdf"){

        $upload = Storage::disk('s3')->put($file->getClientOriginalName(), $file, 'public');

        return Redirect::intended("https://notifyboard.s3.sa-east-1.amazonaws.com/" . $upload);

    }
    
    else{

        Session::flash('pdfIncorrectosMsg', 'El archivo debe tener extensión .pdf');
        $datosInvalidos = true;

    }

    if($datosInvalidos){

        return redirect("/notificaciones/crear");

    }

 })->middleware('noti');