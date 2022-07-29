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
            $table->string("numero");
            $table->string("ano");
            $table->unsignedBigInteger("region_id")->nullable();
            $table->foreign("region_id")->references('id')->on('regiones')->onDelete('cascade');
            $table->unsignedBigInteger("peticion_id")->nullable();
            $table->foreign("peticion_id")->references('id')->on('peticiones')->onDelete('cascade');
            $table->unsignedBigInteger("estatus_id")->nullable();
            $table->foreign("estatus_id")->references('id')->on('estatuses')->onDelete('cascade');
            $table->unsignedBigInteger("tramite_id")->nullable();
            $table->foreign("tramite_id")->references('id')->on('tramites')->onDelete('cascade');
            $table->string("sala");
            $table->string("ponencia");
            $table->date("fecha");
            $table->unsignedBigInteger("actor_id")->nullable();
            $table->foreign("actor_id")->references('id')->on('actores')->onDelete('cascade');
            $table->unsignedBigInteger("dependencia_id")->nullable();
            $table->foreign("dependencia_id")->references('id')->on('dependencias')->onDelete('cascade');
            $table->string("comentarios");
            $table->string("honorario");
            $table->string("pagoinicial");
            $table->date("fecha1");
            $table->date("fecha2");
            $table->date("fecha3");
            $table->date("fecha4");
            $table->date("fecha5");
            $table->date("fecha6");
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