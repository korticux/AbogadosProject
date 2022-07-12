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
        Schema::create('cobranzas', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("cobranza");
            $table->string("tipo");
            $table->unsignedBigInteger("cuenta_id");
            $table->foreign("cuenta_id")->references('id')->on('cuentas');
            $table->unsignedBigInteger("archivos_cobranzas_id");
            $table->foreign("archivos_cobranzas_id")->references('id')->on('archivos_cobranzas');
            $table->string("referencia");
            $table->date("fecha");
            $table->string("monto");
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
        Schema::dropIfExists('cobranzas');
    }
};
