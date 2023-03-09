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
        Schema::table('estados', function (Blueprint $table) {
            $table->unsignedBigInteger("pais_id")->nullable();
            $table->foreign("pais_id")->references('id')->on('paises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estados', function (Blueprint $table) {
            $table->unsignedBigInteger("pais_id")->nullable();
            $table->foreign("pais_id")->references('id')->on('paises')->onDelete('cascade');
        });
    }
};
