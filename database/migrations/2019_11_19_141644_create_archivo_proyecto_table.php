<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivoProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivo_proyecto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('archivo_id')->unsigned();
            $table->bigInteger('proyecto_id')->unsigned();
            $table->foreign('archivo_id')->references('id')->on('archivos');
            $table->foreign('proyecto_id')->references('id')->on('proyectos');
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
        Schema::dropIfExists('archivo_proyecto');
    }
}
