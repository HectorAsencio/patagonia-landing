<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\User;

class UsuariosController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipo =  User::all();

        return view('/equipo', [
            'equipo' => $equipo,
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perfil($id)
    {
        $usuario = User::find($id);
        $files = File::files(public_path() . "/assets/img/users");

        return view('perfil', ['usuario' => $usuario, 'avatars' => $files]);
    }

    public function ayuda($id)
    {
        $usuario = User::find($id)->to;

        return view('ayuda', ['usuario' => $usuario]);
    }

    public function equipoTrabajo() {
        $users = User::select('id', 'name', 'telefono', 'email', 'cargo', 'avatar')->get();
        foreach ($users as $u) {
            $u->avatar = '/assets/img/users/' . $u->avatar;
        }
        $data = [
            'users' => $users
        ];
        return response()->json($data, 200, [], JSON_NUMERIC_CHECK);
    }

    public function nuevoAvatar(Request $request, $nombreArchivo)
    {
        $user = User::find(Auth::id());

        $user->avatar = $nombreArchivo;

        $user->save();

        return redirect("/perfil" . "/" . Auth::id());
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
    public function update(Request $request, $id)
    {
        //
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
