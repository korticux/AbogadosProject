<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("numero")->nullable();
            $table->string("ano")->nullable();
            $table->unsignedBigInteger("region_id")->nullable();
            $table->foreign("region_id")->references('id')->on('regiones')->onDelete('cascade');
            $table->string("sala")->nullable();
            $table->string("ponencia")->nullable();
            $table->unsignedBigInteger("peticion_id")->nullable();
            $table->foreign("peticion_id")->references('id')->on('peticiones')->onDelete('cascade');
            $table->date("fecha")->nullable();
            $table->unsignedBigInteger("actor_id")->nullable();
            $table->foreign("actor_id")->references('id')->on('actores')->onDelete('cascade');
            $table->unsignedBigInteger("dependencia_id")->nullable();
            $table->foreign("dependencia_id")->references('id')->on('dependencias')->onDelete('cascade');
            $table->unsignedBigInteger("estatus_id")->nullable();
            $table->foreign("estatus_id")->references('id')->on('estatuses')->onDelete('cascade');
            $table->unsignedBigInteger("tramite_id")->nullable();
            $table->foreign("tramite_id")->references('id')->on('tramites')->onDelete('cascade');
            $table->string("comentarios")->nullable();
            $table->string("honorario")->nullable();
            $table->string("pagoinicial")->nullable();
            $table->date("fecha1")->nullable();
            $table->date("fecha2")->nullable();
            $table->date("fecha22")->nullable();
            $table->date("fecha3")->nullable();
            $table->date("fecha4")->nullable();
            $table->date("fecha5")->nullable();
            $table->date("fecha6")->nullable();
            $table->date("fecha7")->nullable();

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
        Schema::dropIfExists('expedientes');
    }
};
