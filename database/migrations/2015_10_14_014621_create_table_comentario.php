<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableComentario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contenido');
            $table->datetime('fecha');
            $table->integer('temaid')->unsigned();
            $table->foreign('temaid')->references('id')->on('tema');
            $table->integer('usuarioid')->unsigned();
            $table->foreign('usuarioid')->references('id')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comentario', function(Blueprint $table)
        {
            $table->dropForeign('comentario_temaid_foreign');
            $table->dropForeign('comentario_usuarioid_foreign');
        });
    }
}
