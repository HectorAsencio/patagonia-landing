<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\Notificacion;
use App\Models\User;
use App\Mail\DemoCrearMail;
use App\Mail\DemoEmail;

use Illuminate\Support\Facades\Mail;

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
    
    
    public function dashboard(Request $request)
    {
        // NOTIFICACIONES
        
        $nNotificaciones = Notificacion::count();
        $mnotificaciones = Notificacion::where('receptor_id', Auth::id())->count();
        $aNotificaciones = Notificacion::where('estado', 'Aprobado')->count();
        $rNotificaciones = Notificacion::where('estado', 'Rechazado')->count();
        $pNotificaciones = Notificacion::where('estado', 'Pendiente')->count();


        // USUARIOS
        $nUsuarios = User::count();
        $dUsuarios = User::where('cargo', 'Director')->count();
        $sUsuarios = User::where('cargo', 'Supervisor')->count();

        //listado mes
        
        /*$listadoMeses= Notificacion::select('id', 'created_at')
            ->get()
            ->groupBy(function($mes) {
            return Notificacion::parse($mes->created_at)->format('m');

        var_dump($listadoMeses);*/
        $notiEnero =  DB::table("notificaciones")->whereMonth('created_at', '=', '01')->get()->count();
        $notiFeb =  DB::table("notificaciones")->whereMonth('created_at', '=', '02')->get()->count();
        $notiMarzo =  DB::table("notificaciones")->whereMonth('created_at', '=', '03')->get()->count();
        $notiAbril =  DB::table("notificaciones")->whereMonth('created_at', '=', '04')->get()->count();
        $notiMayo =  DB::table("notificaciones")->whereMonth('created_at', '=', '05')->get()->count();
        $notiJunio =  DB::table("notificaciones")->whereMonth('created_at', '=', '06')->get()->count();
        $notiJulio =  DB::table("notificaciones")->whereMonth('created_at', '=', '07')->get()->count();
        $notiAgosto =  DB::table("notificaciones")->whereMonth('created_at', '=', '08')->get()->count();
        $notiSeptiembre =  DB::table("notificaciones")->whereMonth('created_at', '=', '09')->get()->count();
        $notiOctubre =  DB::table("notificaciones")->whereMonth('created_at', '=', '10')->get()->count();
        $notiNoviembre =  DB::table("notificaciones")->whereMonth('created_at', '=', '11')->get()->count();
        $notiDiciembre =  DB::table("notificaciones")->whereMonth('created_at', '=', '12')->get()->count();
        $listadoMeses=[$notiEnero, $notiFeb, $notiMarzo,$notiAbril,$notiMayo,$notiJunio,$notiJulio,$notiAgosto,$notiSeptiembre,$notiOctubre,$notiNoviembre, $notiDiciembre];

        //var_dump($listadoMeses);

        return view('dashboard', [
            'mNotificaciones' => $mnotificaciones,
            'nNotificaciones' => $nNotificaciones,
            'aNotificaciones' => $aNotificaciones,
            'rNotificaciones' => $rNotificaciones,
            'pNotificaciones' => $pNotificaciones,
            'nUsuarios' => $nUsuarios,
            'dUsuarios' => $dUsuarios,
            'sUsuarios' => $sUsuarios,
            'nNotiUsuarios' => ($nNotificaciones / $nUsuarios),
            'listadoMeses' => $listadoMeses,
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

        if (strlen($request->titulo)<3){
            Session::flash('datosIncorrectosMsg', 'El título debe tener como mínimo 3 caracteres');
            $datosInvalidos = true;
        }
        if (strlen($request->titulo)>64){
            Session::flash('datosIncorrectosTitulo', 'El título debe tener como máximo 64 caracteres');
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

        $receptor = User::find($request->receptor);
        $objDemo = new \stdClass();
        $objDemo->titulo = $notificacion->titulo;
        $objDemo->sender = 'NotifyBoard';
        $objDemo->receiver = $receptor->name;
        $objDemo->id = $notificacion->id;

        Mail::to($receptor->email)->send(new DemoCrearMail($objDemo));

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

        if ($notificacion == NULL){
            $data = ['flag'=>'failure', 'mensaje'=>'No se encontró la notififación ingresada'];
            return response()->json($data, 404, [], JSON_NUMERIC_CHECK);
        }

        else{

            $notificacion->nombreFile = preg_split('/aws.com/', $notificacion->urlFile, -1, PREG_SPLIT_OFFSET_CAPTURE)[1];
            //var_dump($notificacion->nombreFile[0]);
            //var_dump("///-------------------------------");
            $notificacion->nombreFile = preg_split('/.pdf/', $notificacion->nombreFile[0], -1, PREG_SPLIT_OFFSET_CAPTURE)[0];
            $notificacion->nombreFile = str_replace("/", "", $notificacion->nombreFile[0]) . ".pdf";
            //var_dump($notificacion->nombreFile);

        
            return view('vistaDetalle', [
                'notificacion' => $notificacion,
                ]);

            }
 
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
        
        $objDemo = new \stdClass();
        $objDemo->titulo = $notificacion->titulo;
        $objDemo->estado = $notificacion->estado;
        $objDemo->sender = 'NotifyBoard';
        $objDemo->receiver = $notificacion->solicitante->email;
        $objDemo->id = $notificacion->id;

        Mail::to($notificacion->solicitante->email)->send(new DemoEmail($objDemo));

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
            if (strlen($request->titulo)<3){
                return response()->json(['flag'=>'failure', 'mensaje'=>'El título debe tener como mínimo 3 caracteres'], 400, [], JSON_NUMERIC_CHECK);
            }
            if (strlen($request->titulo)>64){
                return response()->json(['flag'=>'failure', 'mensaje'=>'El título debe tener como máximo 64 caracteres'], 400, [], JSON_NUMERIC_CHECK);
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

            $file = $request->urlFile;

            if($file->guessExtension()=="pdf"){

                $upload = Storage::disk('s3')->put($file->getClientOriginalName(), $file, 'public');
                $uploadFullUrl = "https://notifyboard.s3.sa-east-1.amazonaws.com/" . $upload;
            
            }

            $notificacion = Notificacion::create([
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'solicitante_id' => $request->solicitante,
                'receptor_id' => $request->receptor,
                'motivo' => "N/A",
                'urlFile' => $uploadFullUrl
            ]);

            return response()->json(['flag'=>'success', 'mensaje'=>'Notificación creada exitosamente'], 200, [], JSON_NUMERIC_CHECK);
        } catch (\Exception $e) {
            return response()->json(['flag'=>'failure', 'mensaje'=>$e->getMessage()], 200, []);
        }

    }

    public function delete(Request $request, $id){

        $notificacion = Notificacion::find($id);

        $notificacion->delete();

        return redirect('/misnotificaciones');
    }

}
