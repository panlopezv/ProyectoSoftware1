<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEjemplo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejemplo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 45);
            $table->string('descripcion')->nullable();
            $table->string('ubicacionarchivo', 60);
            $table->integer('descargas')->default(0);
            $table->integer('temaid')->unsigned();
            $table->foreign('temaid')->references('id')->on('tema');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ejemplo', function(Blueprint $table)
        {
            $table->dropForeign('ejemplo_temaid_foreign');
        });
    }
}
