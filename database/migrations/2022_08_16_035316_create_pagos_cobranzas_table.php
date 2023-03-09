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
        Schema::create('pagos_cobranzas', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string('nombre_pagos')->nullable();
            $table->unsignedBigInteger('cobranza_id')->nullable();
            $table->foreign('cobranza_id')->references('id')->on('cobranzas')->onDelete('cascade');
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
        Schema::dropIfExists('pagos_cobranzas');
    }
};
