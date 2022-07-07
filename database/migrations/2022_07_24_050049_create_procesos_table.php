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
            $table->unsignedBigInteger("expedientes_id");
            $table->foreign("expedientes_id")->references('id')->on('expedientes');
            $table->date("fecha_de_ingreso");
            $table->date("fecha_cedula_notificacion");
            $table->string("numero_de_oficio");
            $table->date("fecha_oficio");
            $table->date("fecha_notificacion_admision");
            $table->string("quien_recibio");
            $table->string("numero_guia");
            $table->date("negativa_ficha");
            $table->date("documento_impugnado_original");
            $table->date("fecha_demanda");
            $table->string("numero_expediente");
            $table->date("fecha_contestacion_del_tribunal")->nullable();
            $table->string("contestacion")->nullable();
            $table->date("fecha_publicacion_boletin")->nullable();
            $table->date("fecha_de_ingreso_de_reclamo")->nullable();
            $table->date("fecha_de_admision_o_desecho")->nullable();
            $table->date("fecha_correo_admision_de_demanda")->nullable();
            $table->date("fecha_notificacion")->nullable();
            $table->date("surte_efecto")->nullable();
            $table->date("boletin_oficial")->nullable();
            $table->date("traslados")->nullable();
            $table->date("fecha_contestacion_issste")->nullable();
            $table->string("contestacion_issste")->nullable();
            $table->string("recursos_para_seguimiento")->nullable();
            $table->date("fecha_admision_de_ampliacion_de_demanda")->nullable();
            $table->date("fecha_correo_ampliacion")->nullable();
            $table->date("fecha_boletin_ampliacion")->nullable();
            $table->date("fecha_correo_cierre_de_instruccion")->nullable();
            $table->date("fecha_de_boletin_de_cierre_de_instruccion")->nullable();
            $table->string("sentencia")->nullable();
            $table->date("sentencia_dictada_correo")->nullable();
            $table->date("sentencia_dicatada_boletin")->nullable();
            $table->date("fecha_amparo")->nullable();
            $table->string("numero_amparo")->nullable();
            $table->string("toca")->nullable();
            $table->string("sala")->nullable();
            $table->string("otro")->nullable();
            $table->date("fecha_admision_amparo")->nullable();
            $table->date("boletin_admision_amparo")->nullable();
            $table->date("fecha_correo_resolucion")->nullable();
            $table->date("fecha_boletin_resolucion")->nullable();
            $table->string("resolucion_amparo")->nullable();
            $table->date("resolucion_de_amparo_positiva")->nullable();
            $table->date("decimo_transitorio")->nullable();
            $table->date("recurso_de_revision")->nullable();
            $table->date("recurso_de_queja")->nullable();
            $table->date("notificacion_recurso_de_queja")->nullable();
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
