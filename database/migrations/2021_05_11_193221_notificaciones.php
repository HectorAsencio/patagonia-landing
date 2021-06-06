<?php

//php artisan make:migration notificaciones.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Notificaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificaciones', function (Blueprint $table){

            $table->id();

            $table->bigInteger('solicitante_id')->unsigned()->index()->nullable();
            $table->foreign('solicitante_id')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('receptor_id')->unsigned()->index()->nullable();
            $table->foreign('receptor_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->text('titulo');
            $table->longText('descripcion');

            $table->string('estado')->default("Nueva");
            $table->date('respondido_at')->default("1900-01-01");
            $table->longText('motivo');

            $table->longText('urlFile');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()

        //migrar con -> php artisan migrate

    {
        Schema::dropIfExists('notificaciones');
    }
}