<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivoTramiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivo_tramite', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('archivo_id')->unsigned();
            $table->bigInteger('tramite_id')->unsigned();
            $table->foreign('archivo_id')->references('id')->on('archivos');
            $table->foreign('tramite_id')->references('id')->on('tramites');

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
        Schema::dropIfExists('archivo_tramite');
    }
}
