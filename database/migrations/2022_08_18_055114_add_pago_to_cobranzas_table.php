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
        Schema::table('cobranzas', function (Blueprint $table) {
            $table->unsignedBigInteger('pagos_cobranza_id')->nullable();
            $table->foreign('pagos_cobranza_id')->references('id')->on('pagos_cobranzas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cobranzas', function (Blueprint $table) {
            $table->unsignedBigInteger('pagos_cobranza_id')->nullable();
            $table->foreign('pagos_cobranza_id')->references('id')->on('pagos_cobranzas')->onDelete('cascade');
        });
    }
};
