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
        Schema::create('procesos', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("expediente");
            $table->string("consecutivo");
            $table->date("FechaDeIngreso");
            $table->date("FechaCedulaNotificacion");
            $table->string("NumeroDeOficio");
            $table->date("FechaOficio");
            $table->date("FechaNotificacionAdmision");
            $table->string("QuienRecibio");
            $table->string("NumeroGuia");
            $table->date("NegativaFicha");
            $table->date("DocumentoImpugnadoOriginal");
            $table->date("FechaDemanda");
            $table->string("NumeroExpediente");
            $table->date("FechaContestacionDelTribunal");
            $table->string("Contestacion");
            $table->date("FechaPublicacionBoletin");
            $table->date("FechaDeIngresoDeReclamo");
            $table->date("FechaDeAdmisionODesecho");
            $table->date("FechaCorreoAdmisionDeDemanda");
            $table->date("FechaNotificacion");
            $table->date("SurteEfecto");
            $table->date("BoletinOficial");
            $table->date("Traslados");
            $table->date("FechaContestacionISSSTE");
            $table->string("Contestacion ISSSTE");
            $table->string("RecuersosParaSeguimiento");
            $table->date("FechaAdmisionDeAmpliacionDeDemanda");
            $table->date("FechaCorreoAmpliacion");
            $table->string("FechaBoletinAmpliacion");
            $table->date("FechaCorreoCierreDeInstruccion");
            $table->date("FechaDeBoletinDeCierreDeInstruccion");
            $table->string("Sentencia");
            $table->date("SentenciaDictadaCorreo");
            $table->date("SentenciaDictadaBoletin");
            $table->date("FechaAmparo");
            $table->string("NumeroAmparo");
            $table->string("Toca");
            $table->string("Sala");
            $table->string("Otro");
            $table->date("FechaAdmisionAmparo");
            $table->date("BoletinAdmisionAmparo");
            $table->date("FechaCorreoResolucion");
            $table->date("FechaBoletinResolucion");
            $table->string("ResolucionAmparo");
            $table->date("ResolucionDeAmparoPositiva");
            $table->date("DecimoTransitorio");
            $table->date("RecursoDeRevision");
            $table->date("RecursoDeQueja");
            $table->date("NotificacionRecursoDeQueja");
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
        Schema::dropIfExists('procesos');
    }
};
