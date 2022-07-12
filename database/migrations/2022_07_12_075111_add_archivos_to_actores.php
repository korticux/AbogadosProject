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
        Schema::table('actores', function (Blueprint $table) {
            $table->unsignedBigInteger('archivos_actores_id')->nullable();
            $table->foreign('archivos_actores_id')->references('id')->on('archivos_actores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actores', function (Blueprint $table) {
            $table->unsignedBigInteger('archivos_actores_id')->nullable();
            $table->foreign('archivos_actores_id')->references('id')->on('archivos_actores');
        });
    }
};
