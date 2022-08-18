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
        Schema::table('pagos_cobranzas', function (Blueprint $table) {
            $table->float("monto")->nullable();
            $table->float("total")->nullable();
            $table->string("comentario")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pagos_cobranzas', function (Blueprint $table) {
            $table->float("monto")->nullable();
            $table->float("total")->nullable();
            $table->string("comentario")->nullable();
        });
    }
};
