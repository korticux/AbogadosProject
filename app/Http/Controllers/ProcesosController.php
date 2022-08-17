<?php

namespace App\Http\Controllers;
use App\Exports\ProcesoExport;
use Carbon\Carbon;
use App\Models\Proceso;
use App\Models\Expedientes;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class ProcesosController extends Controller
{

    public function createPDF(){
        $datos = Proceso::all();
        $pdf = PDF::loadView('admin.procesos.createPDF', compact('datos'));
        return $pdf->download('Proceso_PDF.pdf');
    }

    public function index() {
        $procesos = Proceso::latest()->paginate(5);
        return View("admin.procesos.index" , compact("procesos"));
    }

    public function post()
    {

        $expedientes = Expedientes::latest()->get();
        return View('admin.procesos.create', compact("expedientes"));

    }

    public function store(Request $request)
    {
        $request->validate([
            'expedientes_id' => '',
            'fecha_de_ingreso' => '',
            'fecha_cedula_notificacion' => '',
            'numero_de_oficio' => '',
            'fecha_oficio' => '',
            'fecha_notificacion_admision' => '',
            'quien_recibio' => '',
            'numero_guia' => '',
            'negativa_ficha' => '',
            'documento_impugnado_original' => '',
            'fecha_demanda' => '',
            'numero_expediente' => '',

        ], [
            'expedientes_id.required' => 'El expediente del proceso es requerido',
            'fecha_de_ingreso.required' => 'La fecha de ingreso es requerida',
            'fecha_cedula_notificacion.required' => 'La fecha de cedula es requerida',
            'numero_de_oficio.required' => 'El numero de oficio es requerido',
            'fecha_oficio.required' => 'La fecha del oficio es requerida',
            'fecha_notificacion_admision.required' => 'La fecha de notificacion es requerida',
            'quien_recibio.required' => 'Quien recibio es requerido',
            'numero_guia.required' => 'El numero de guia requerido',
            'negativa_ficha.required' => 'La negativa ficha es requerida',
            'documento_impugnado_original.required' => 'El documento impugnado es requerido',
            'fecha_demanda.required' => 'La fecha de demanda es requerida',
            'numero_expediente.required' => 'El numero de expediente es requerido',

        ]);


        Proceso::insert([
            'expedientes_id' => $request->expedientes_id,
            'fecha_de_ingreso' => $request->fecha_de_ingreso,
            'fecha_cedula_notificacion' => $request->fecha_cedula_notificacion,
            'numero_de_oficio' => $request->numero_de_oficio,
            'fecha_oficio' => $request->fecha_oficio,
            'fecha_notificacion_admision' => $request->fecha_notificacion_admision,
            'quien_recibio' => $request->quien_recibio,
            'numero_guia' => $request->numero_guia,
            'negativa_ficha' => $request->negativa_ficha,
            'documento_impugnado_original' => $request->documento_impugnado_original,
            'fecha_demanda' => $request->fecha_demanda,
            'numero_expediente' => $request->numero_expediente,
            'comentario1' => $request->comentario1,
            'created_at' => Carbon::now(),
        ]);

        $notification  = array(
            'message' => "Proceso Agregado Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('proceso.index')->with($notification);
    }

    public function delete($id)
    {

        Proceso::findOrFail($id)->delete();

        $notification = array(
            'message' => "Proceso Eliminado Correctamente",
            'alert-type' => "error",
        );

        return redirect()->route('proceso.index')->with($notification);
    }

    public function edit($id)
    {
        $proceso = Proceso::findOrFail($id);
        $expedientes = Expedientes::latest()->get();
        return View('admin.procesos.update', compact("proceso", "expedientes"));
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'expedientes_id' => '',
            'fecha_de_ingreso' => '',
            'fecha_cedula_notificacion' => '',
            'numero_de_oficio' => '',
            'fecha_oficio' => '',
            'fecha_notificacion_admision' => '',
            'quien_recibio' => '',
            'numero_guia' => '',
            'negativa_ficha' => '',
            'documento_impugnado_original' => '',
            'fecha_demanda' => '',
            'numero_expediente' => '',
        ], [
            'expedientes_id.required' => 'El expediente del proceso es requerido',
            'fecha_de_ingreso.required' => 'La fecha de ingreso es requerida',
            'fecha_cedula_notificacion.required' => 'La fecha de cedula es requerida',
            'numero_de_oficio.required' => 'El numero de oficio es requerido',
            'fecha_oficio.required' => 'La fecha del oficio es requerida',
            'fecha_notificacion_admision.required' => 'La fecha de notificacion es requerida',
            'quien_recibio.required' => 'Quien recibio es requerido',
            'numero_guia.required' => 'El numero de guia requerido',
            'negativa_ficha.required' => 'La negativa ficha es requerida',
            'documento_impugnado_original.required' => 'El documento impugnado es requerido',
            'fecha_demanda.required' => 'La fecha de demanda es requerida',
            'numero_expediente.required' => 'El numero de expediente es requerido',
        ]);

        Proceso::findOrFail($id)->update([
            'expedientes_id' => $request->expedientes_id,
            'fecha_de_ingreso' => $request->fecha_de_ingreso,
            'fecha_cedula_notificacion' => $request->fecha_cedula_notificacion,
            'numero_de_oficio' => $request->numero_de_oficio,
            'fecha_oficio' => $request->fecha_oficio,
            'fecha_notificacion_admision' => $request->fecha_notificacion_admision,
            'quien_recibio' => $request->quien_recibio,
            'numero_guia' => $request->numero_guia,
            'negativa_ficha' => $request->negativa_ficha,
            'documento_impugnado_original' => $request->documento_impugnado_original,
            'fecha_demanda' => $request->fecha_demanda,
            'numero_expediente' => $request->numero_expediente,
            'fecha_contestacion_del_tribunal' => $request->fecha_contestacion_del_tribunal,
            'contestacion' => $request->contestacion,
            'fecha_publicacion_boletin' => $request->fecha_publicacion_boletin,
            'fecha_de_ingreso_de_reclamo' => $request->fecha_de_ingreso_de_reclamo,
            'fecha_de_admision_o_desecho' => $request->fecha_de_admision_o_desecho,
            'fecha_correo_admision_de_demanda' => $request->fecha_correo_admision_de_demanda,
            'fecha_notificacion' => $request->fecha_notificacion,
            'surte_efecto' => $request->surte_efecto,
            'boletin_oficial' => $request->boletin_oficial,
            'traslados' => $request->traslados,
            'fecha_contestacion_issste' => $request->fecha_contestacion_issste,
            'contestacion_issste' => $request->contestacion_issste,
            'recursos_para_seguimiento' => $request->recursos_para_seguimiento,
            'fecha_admision_de_ampliacion_de_demanda' => $request->fecha_admision_de_ampliacion_de_demanda,
            'fecha_correo_ampliacion' => $request->fecha_correo_ampliacion,
            'fecha_boletin_ampliacion' => $request->fecha_boletin_ampliacion,
            'fecha_correo_cierre_de_instruccion' => $request->fecha_correo_cierre_de_instruccion,
            'fecha_de_boletin_de_cierre_de_instruccion' => $request->fecha_de_boletin_de_cierre_de_instruccion,
            'sentencia' => $request->sentencia,
            'sentencia_dictada_correo' => $request->sentencia_dictada_correo,
            'sentencia_dicatada_boletin' => $request->sentencia_dicatada_boletin,
            'fecha_amparo' => $request->fecha_amparo,
            'numero_amparo' => $request->numero_amparo,
            'toca' => $request->toca,
            'sala' => $request->sala,
            'otro' => $request->otro,
            'fecha_admision_amparo' => $request->fecha_admision_amparo,
            'boletin_admision_amparo' => $request->boletin_admision_amparo,
            'fecha_correo_resolucion' => $request->fecha_correo_resolucion,
            'fecha_boletin_resolucion' => $request->fecha_boletin_resolucion,
            'resolucion_amparo' => $request->resolucion_amparo,
            'resolucion_de_amparo_positiva' => $request->resolucion_de_amparo_positiva,
            'decimo_transitorio' => $request->decimo_transitorio,
            'recurso_de_revision' => $request->recurso_de_revision,
            'recurso_de_queja' => $request->recurso_de_queja,
            'notificacion_recurso_de_queja' => $request->notificacion_recurso_de_queja,
            'comentario1' => $request->comentario1,
            'comentario2' => $request->comentario2,
            'comentario3' => $request->comentario3,
            'updated_at' => \Carbon\Carbon::now(),


        ]);

        $notification = array(
            'message' => "Proceso Actualizado Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('proceso.index')->with($notification);
    }

    public function export()
    {
        return Excel::download(new ProcesoExport, "Proceso.xlsx");
    }

}
