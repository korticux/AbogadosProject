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
        Schema::table('expedientes', function (Blueprint $table) {
            $table->unsignedBigInteger('archivos_expedientes_id')->nullable();
            $table->foreign('archivos_expedientes_id')->references('id')->on('archivos_expedientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('expedientes', function (Blueprint $table) {
            $table->unsignedBigInteger('archivos_expedientes_id')->nullable();
            $table->foreign('archivos_expedientes_id')->references('id')->on('archivos_expedientes')->onDelete('cascade');
        });
    }
};
