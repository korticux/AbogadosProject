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
            $table->string("cobranza")->nullable();
            $table->string("tipo")->nullable();
            $table->unsignedBigInteger("cuenta_id")->nullable();
            $table->foreign("cuenta_id")->references('id')->on('cuentas')->onDelete('cascade');
            $table->string("referencia")->nullable();
            $table->date("fecha")->nullable();
            $table->float("monto_percibido")->nullable();
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
