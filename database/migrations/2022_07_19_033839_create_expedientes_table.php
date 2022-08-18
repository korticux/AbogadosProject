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
            $table->string("sala");
            $table->string("ponencia");
            $table->unsignedBigInteger("peticion_id")->nullable();
            $table->foreign("peticion_id")->references('id')->on('peticiones')->onDelete('cascade');
            $table->date("fecha");
            $table->unsignedBigInteger("actor_id")->nullable();
            $table->foreign("actor_id")->references('id')->on('actores')->onDelete('cascade');
            $table->unsignedBigInteger("dependencia_id")->nullable();
            $table->foreign("dependencia_id")->references('id')->on('dependencias')->onDelete('cascade');
            $table->unsignedBigInteger("estatus_id")->nullable();
            $table->foreign("estatus_id")->references('id')->on('estatuses')->onDelete('cascade');
            $table->unsignedBigInteger("tramite_id")->nullable();
            $table->foreign("tramite_id")->references('id')->on('tramites')->onDelete('cascade');
            $table->string("comentarios")->nullable();
            $table->string("honorario");
            $table->string("pagoinicial");
            $table->date("fecha1")->nullable();
            $table->date("fecha2")->nullable();
            $table->date("fecha22")->nullable();
            $table->date("fecha3")->nullable();
            $table->date("fecha4")->nullable();
            $table->date("fecha5")->nullable();
            $table->date("fecha6")->nullable();
            $table->date("fecha7")->nullable();
            $table->date("fecha8")->nullable();
            $table->date("fecha9")->nullable();
            $table->date("fecha10")->nullable();
            $table->date("fecha11")->nullable();
            $table->date("fecha12")->nullable();
            $table->date("fecha13")->nullable();
            $table->date("fecha14")->nullable();
            $table->date("fecha15")->nullable();
            $table->string("comentario1")->nullable();
            $table->string("comentario2")->nullable();
            $table->string("comentario3")->nullable();
            $table->string("comentario4")->nullable();
            $table->string("comentario5")->nullable();
            $table->string("comentario6")->nullable();
            $table->string("comentario7")->nullable();
            $table->string("comentario8")->nullable();
            $table->string("comentario9")->nullable();
            $table->string("comentario10")->nullable();
            $table->string("comentario12")->nullable();
            $table->string("comentario13")->nullable();
            $table->string("comentario14")->nullable();
            $table->string("comentario15")->nullable();
            $table->string("tipo_actor")->nullable();
            $table->string("numero_exp")->nullable();
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
