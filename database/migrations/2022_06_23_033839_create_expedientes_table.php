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
            $table->string("region");
            $table->string("sala");
            $table->string("ponencia");
            $table->string("peticion");
            $table->date("fecha");
            $table->unsignedBigInteger("actor_id");
            $table->foreign("actor_id")->references('id')->on('actores');
            $table->string("dependencia");
            $table->string("estatus");
            $table->string("tramites");
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
