<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

use App\Models\Notificacion;

class NotificacionesController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $notificaciones = Notificacion::where('receptor_id', Auth::id())->get();
        return view('notificaciones', ['notificaciones' => $notificaciones]);
    }
    public function mias(Request $request)
    {
        $notificaciones = Notificacion::where('solicitante_id', Auth::id())->get();
        return view('misNotificaciones', ['notificaciones' => $notificaciones]);
    }
    /*public function ver(Request $request)
    {
        $notificaciones = Notificacion::where('solicitante_id', Auth::id())->get();
        return view('verNotificacion', ['notificaciones' => $notificaciones]);
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $users =  DB::table('users')->get();

        $flashMsg = $request->session()->flash('status');

        return view('crearNotificacion', ['users' => $users, 'flash' => $flashMsg]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosInvalidos = false;

        if (strlen($request->titulo)<4){
            Session::flash('datosIncorrectosMsg', 'El título debe tener como mínimo 4 caracteres');
            $datosInvalidos = true;
        }
        if (strlen($request->titulo)>20){
            Session::flash('datosIncorrectosTitulo', 'El título debe tener como máximo 20 caracteres');
            $datosInvalidos = true;
        }
        if (strlen($request->descripcion)<10){
            Session::flash('datosIncorrectosAsunto', 'La descripción debe tener como mínimo 10 caracteres');
            $datosInvalidos = true;
        }
        if (strlen($request->descripcion)>200){
            Session::flash('datosIncorrectosAsuntoMax', 'La descripción debe tener como máximo 200 caracteres');
            $datosInvalidos = true;
        }
        if ($request->receptor=="Elegir"){
            Session::flash('datosIncorrectosReceptor', 'Debe seleccionar un receptor');
            $datosInvalidos = true;
        }

        if ($datosInvalidos) {
            return redirect("/notificaciones/crear");
        }

        $notificacion = Notificacion::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'solicitante_id' => Auth::id(),
            'receptor_id' => $request->receptor,
            'motivo' => "N/A",
        ]);

        return redirect("/notificaciones/usuario");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notificacion = Notificacion::find($id);

        return view('vistaDetalle', ['notificacion' => $notificacion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $cambio)
    {
        $notificacion = Notificacion::find($id);

        if ($cambio=="aprobar"){

            $notificacion->estado = "Aprobado";

        }

        else if ($cambio=="rechazar"){

            $notificacion->estado = "Rechazado";

        }

        else {

            $notificacion->estado = "Pendiente";

        }

        $notificacion->respondido_at = new \DateTime();

        $notificacion->save();

        return redirect("/notificaciones");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
