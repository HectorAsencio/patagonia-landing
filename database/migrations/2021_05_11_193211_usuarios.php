<?php

//php artisan make:migration usuarios.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {

            $table->id();
            $table->string('nombre');
            $table->string('cargo');
            $table->string('telefono');
            $table->string('avatar');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()

    {
        //migrar con -> php artisan migrate
        Schema::dropIfExists('usuarios');

    }
}
