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
            $table->string('estado');
            $table->string('solicitante');
            $table->string('cargo_solicitante');
            $table->string('cargo_aprobador');
            $table->string('email_solicitante');
            $table->text('descripcion');
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
