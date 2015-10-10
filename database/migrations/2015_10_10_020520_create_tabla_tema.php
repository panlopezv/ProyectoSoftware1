<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaTema extends Migration
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
            $table->integer('usuarioid');
            $table->integer('categoriaid');
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
        Schema::drop('tema');
    }
}
