<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivoContenidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivo_contenido', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('archivo_id')->unsigned();
            $table->bigInteger('contenido_id')->unsigned();
            $table->foreign('archivo_id')->references('id')->on('archivos');
            $table->foreign('contenido_id')->references('id')->on('contenidos');
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
        Schema::dropIfExists('archivo_contenido');
    }
}
