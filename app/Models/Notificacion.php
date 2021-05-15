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
use Illuminate\Notifications\Notifiable;

class Notificacion extends Model
{
    protected $table = "notificaciones";
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'titulo',
        'descripcion',
        'solicitante_id',
        'receptor_id',
        'estado',
        'respondido_at',
        'motivo',

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    public function solicitante()
    {
        return $this->belongsTo(\App\Models\User::class, 'solicitante_id');
    }

    public function receptor()
    {
        return $this->belongsTo(\App\Models\User::class, 'receptor_id');
    }

}