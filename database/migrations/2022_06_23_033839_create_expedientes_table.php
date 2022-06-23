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
            $table->string("fecha");
            $table->string("actor");
            $table->string("dependencia");
            $table->string("estatus");
            $table->string("tramites");
            $table->string("comentarios");
            $table->string("honorario");
            $table->string("pagoinicial");
            $table->string("fecha1");
            $table->string("fecha2");
            $table->string("fecha3");
            $table->string("fecha4");
            $table->string("fecha5");
            $table->string("fecha6");
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
