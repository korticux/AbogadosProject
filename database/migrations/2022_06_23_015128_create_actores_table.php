
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
            $table->string("nocliente")->nullable();
            $table->datetime("agregado")->nullable();
            $table->string("nombre")->nullable();
            $table->string("curp")->nullable();
            $table->string("rfc")->nullable();
            $table->date("nacimiento")->nullable();
            $table->string("correo")->nullable();
            $table->string("telefono")->nullable();
            $table->string("domicilio")->nullable();
            $table->unsignedBigInteger("estado_id")->nullable();
            $table->foreign("estado_id")->references('id')->on('estados')->onDelete('cascade')->nullable();
            $table->string("ciudad")->nullable();
            $table->string("comentarios")->nullable();
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
