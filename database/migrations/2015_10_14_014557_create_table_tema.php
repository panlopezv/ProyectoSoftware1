<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tema', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 45);
            $table->string('contenido');
            $table->datetime('fechapublicacion');
            $table->string('referencia', 60);
            $table->integer('visitas')->default(0);
            $table->integer('usuarioid')->unsigned();
            $table->foreign('usuarioid')->references('id')->on('usuario');
            $table->integer('categoriaid')->unsigned();
            $table->foreign('categoriaid')->references('id')->on('categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tema', function(Blueprint $table)
        {
            $table->dropForeign('tema_usuarioid_foreign');
            $table->dropForeign('tema_categoriaid_foreign');
        });
    }
}
