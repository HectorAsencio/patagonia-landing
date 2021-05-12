<?php

//php artisan make:model Notificacion

// php artisan tinker

// use App\Models\Notificacion;

//**Luego se debe crear una instancia de esa clase de la siguiente manera**

//$notificacion = new Notificacion;
//$notificacion->estado = 'nueva';
//$notificacion->solicitante = 'juanito perez';

//para mostrar solo se debe ingresar $notificacion

//para guardar cambios se debe ingresar $notificacion->save();


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;
}