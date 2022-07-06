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
            $table->date("fecha_contestacion_del_tribunal");
            $table->string("contestacion");
            $table->date("fecha_publicacion_boletin");
            $table->date("fecha_de_ingreso_de_reclamo");
            $table->date("fecha_de_admision_o_desecho");
            $table->date("fecha_correo_admision_de_demanda");
            $table->date("fecha_notificacion");
            $table->date("surte_efecto");
            $table->date("boletin_oficial");
            $table->date("traslados");
            $table->date("fecha_contestacion_issste");
            $table->string("contestacion_issste");
            $table->string("recursos_para_seguimiento");
            $table->date("fecha_admision_de_ampliacion_de_demanda");
            $table->date("fecha_correo_ampliacion");
            $table->date("fecha_boletin_ampliacion");
            $table->date("fecha_correo_cierre_de_instruccion");
            $table->date("fecha_de_boletin_de_cierre_de_instruccion");
            $table->string("sentencia");
            $table->date("sentencia_dictada_correo");
            $table->date("sentencia_dicatada_boletin");
            $table->date("fecha_amparo");
            $table->string("numero_amparo");
            $table->string("toca");
            $table->string("sala");
            $table->string("otro");
            $table->date("fecha_admision_amparo");
            $table->date("boletin_admision_amparo");
            $table->date("fecha_correo_resolucion");
            $table->date("fecha_boletin_resolucion");
            $table->string("resolucion_amparo");
            $table->date("resolucion_de_amparo_positiva");
            $table->date("decimo_transitorio");
            $table->date("recurso_de_revision");
            $table->date("recurso_de_queja");
            $table->date("notificacion_recurso_de_queja");
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
