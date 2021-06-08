<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
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

        $nNotificacionesXResponder = Notificacion::where('receptor_id', Auth::id())->where('estado', 'Nueva')->count();

        return view('notificaciones', [
            'notificaciones' => $notificaciones,
            'nNotificacionesXResponder' => $nNotificacionesXResponder,
            ]);
    }
    public function mias(Request $request)
    {
        $notificaciones = Notificacion::where('solicitante_id', Auth::id())->get();
        return view('misNotificaciones', [
            'notificaciones' => $notificaciones,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $users =  DB::table('users')->get();

        $flashMsg = $request->session()->flash('status');

        return view('crearNotificacion', [
            'users' => $users,
            'flash' => $flashMsg
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAPI(Request $request)
    {
        $users =  DB::table('users')->get();

        return view('crearAPI', [
            'users' => $users
            ]);
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

        $file = request()->file('upload');

        if($file->guessExtension()=="pdf"){

            $upload = Storage::disk('s3')->put($file->getClientOriginalName(), $file, 'public');
            $uploadFullUrl = "https://notifyboard.s3.sa-east-1.amazonaws.com/" . $upload;
        
        }

        else{

            Session::flash('pdfIncorrectosMsg', 'El archivo debe tener extensión .pdf');
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
            'urlFile' => $uploadFullUrl
        ]);

        return redirect("/misnotificaciones");
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

        return view('vistaDetalle', [
            'notificacion' => $notificacion,
            ]);
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

    public function NotiUsuario($userId){
        $notificaciones = Notificacion::where('solicitante_id', $userId)->get();
        $data = [
            'flag'=>'success',
            'mensaje'=>'Notificaciones del usuario en calidad de solicitante',
            'notificaciones'=>$notificaciones
        ];
        return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

    public function NotiBandeja($userId){
        $notificaciones = Notificacion::where('receptor_id', $userId)->get();
        $data = [
            'flag'=>'success',
            'mensaje'=>'Notificaciones del usuario en calidad de receptor',
            'notificaciones'=>$notificaciones
        ];
        return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

    public function Actualizar($notiId, $accion){ // aprobar / rechazar

        // Buscamos objeto de notificación
        $notificacion = Notificacion::find($notiId);

        if ($notificacion == NULL){
            $data = ['flag'=>'failure', 'mensaje'=>'No se encontró la notififación ingresada'];
            return response()->json($data, 404, [], JSON_NUMERIC_CHECK);
        }

        // SI accion == aprobar -> estado = Aprobado
        // SI accion == rechazar -> estado = Rechazado
        if ($accion=="aprobar"){
            $notificacion->estado = "Aprobado";
        }
        else if ($accion=="rechazar"){
            $notificacion->estado = "Rechazado";
        }
        else{
            return response()->json(['flag'=>'failure', 'mensaje'=>'Ingrese una acción correcta (aprobar / rechazar)'], 400, [], JSON_NUMERIC_CHECK);
        }

        // Actualizar fecha de respuesta
        $notificacion->respondido_at = new \DateTime();

        // Guardar documento editado en base de datos
        $notificacion->save();

        // Retornar JSON
        $data = ['flag'=>'success', 'mensaje'=>'Notificación actualizada exitosamente'];
        return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

    public function crear(Request $request){
        try{
            if (strlen($request->titulo)<4){
                return response()->json(['flag'=>'failure', 'mensaje'=>'El título debe tener como mínimo 4 caracteres'], 400, [], JSON_NUMERIC_CHECK);
            }
            if (strlen($request->titulo)>20){
                return response()->json(['flag'=>'failure', 'mensaje'=>'El título debe tener como máximo 20 caracteres'], 400, [], JSON_NUMERIC_CHECK);
            }
            if (strlen($request->descripcion)<10){
                return response()->json(['flag'=>'failure', 'mensaje'=>'La descripción debe tener como mínimo 10 caracteres'], 200, [], JSON_NUMERIC_CHECK);
            }
            if (strlen($request->descripcion)>200){
                return response()->json(['flag'=>'failure', 'mensaje'=>'La descripción debe tener como máximo 200 caracteres'], 200, [], JSON_NUMERIC_CHECK);
            }
            if ($request->receptor=="Elegir"){
                return response()->json(['flag'=>'failure', 'mensaje'=>'Debe seleccionar un receptor'], 200, [], JSON_NUMERIC_CHECK);
            }

            $notificacion = Notificacion::create([
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'solicitante_id' => $request->solicitante,
                'receptor_id' => $request->receptor,
                'motivo' => "N/A",
            ]);

            return response()->json(['flag'=>'success', 'mensaje'=>'Notificación creada exitosamente'], 200, [], JSON_NUMERIC_CHECK);
        } catch (\Exception $e) {
            return response()->json(['flag'=>'failure', 'mensaje'=>$e->getMessage()], 200, []);
        }

    }
}
