<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usuario', 45)->unique();
            $table->string('correo')->unique();
            $table->string('contrasenya', 60);
            $table->integer('personaid')->unsigned();
            $table->foreign('personaid')->references('id')->on('persona');
            $table->integer('tipousuarioid')->unsigned();
            $table->foreign('tipousuarioid')->references('id')->on('tipousuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuario', function(Blueprint $table)
        {
            $table->dropForeign('usuario_personaid_foreign');
            $table->dropForeign('usuario_tipousuarioid_foreign');
        });
    }
}
