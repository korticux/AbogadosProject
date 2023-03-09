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
        Schema::table('procesos', function (Blueprint $table) {
            $table->string("comentario1")->nullable();
            $table->string("comentario2")->nullable();
            $table->string("comentario3")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('procesos', function (Blueprint $table) {
            $table->string("comentario1")->nullable();
            $table->string("comentario2")->nullable();
            $table->string("comentario3")->nullable();
        });
    }
};
