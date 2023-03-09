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
            $table->date("fecha8")->nullable;
            $table->date("fecha9")->nullable;
            $table->date("fecha10")->nullable;
            $table->date("fecha11")->nullable;
            $table->date("fecha12")->nullable;
            $table->date("fecha13")->nullable;
            $table->date("fecha14")->nullable;
            $table->date("fecha15")->nullable;
            $table->string("comentario1")->nullable;
            $table->string("comentario2")->nullable;
            $table->string("comentario3")->nullable;
            $table->string("comentario4")->nullable;
            $table->string("comentario5")->nullable;
            $table->string("comentario6")->nullable;
            $table->string("comentario7")->nullable;
            $table->string("comentario8")->nullable;
            $table->string("comentario9")->nullable;
            $table->string("comentario10")->nullable;
            $table->string("comentario12")->nullable;
            $table->string("comentario13")->nullable;
            $table->string("comentario14")->nullable;
            $table->string("comentario15")->nullable;
            $table->string("tipo_actor")->nullable;
            $table->string("numero_exp")->nullable;
        });
    }
};
