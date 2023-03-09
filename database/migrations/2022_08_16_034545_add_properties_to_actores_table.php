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
            $table->string("honorario")->nullable();
            $table->date("fecha1")->nullable();
            $table->string("abonado")->nullable();
            $table->unsignedBigInteger("dependencia_id")->nullable();
            $table->foreign("dependencia_id")->references('id')->on('dependencias')->onDelete('cascade');
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
            $table->string("honorario")->nullable();
            $table->date("fecha1")->nullable();
            $table->string("abonado")->nullable();
            $table->unsignedBigInteger("dependencia_id")->nullable();
            $table->foreign("dependencia_id")->references('id')->on('dependencias')->onDelete('cascade');
        });
    }
};
