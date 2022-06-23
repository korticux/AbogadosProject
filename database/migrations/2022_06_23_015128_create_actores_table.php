
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
        Schema::create('actores', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("nocliente");
            $table->string("agregado");
            $table->string("nombre");
            $table->string("curp");
            $table->string("rfc");
            $table->string("nacimiento");
            $table->string("correo");
            $table->string("telefono");
            $table->string("domicilio");
            $table->string("estado");
            $table->string("ciudad");
            $table->string("comentarios");
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
        Schema::dropIfExists('actores');
    }
};
