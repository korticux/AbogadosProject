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
        Schema::create('archivos_actores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_archivo');
            $table->unsignedBigInteger('actor_id');
            $table->foreign('actor_id')->references('id')->on('actores')->onDelete('cascade');
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
        Schema::dropIfExists('archivos_actores');
    }
};
