<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Proceso;
use App\Models\Expedientes;

use Illuminate\Http\Request;

class ProcesosController extends Controller
{
    public function index() {
        $procesos = Proceso::latest()->get();
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
            'expedientes_id' => 'required',
            'fecha_de_ingreso' => 'required',
            'fecha_cedula_notificacion' => 'required',
            'numero_de_oficio' => 'required',
            'fecha_oficio' => 'required',
            'fecha_notificacion_admision' => 'required',
            'quien_recibio' => 'required',
            'numero_guia' => 'required',
            'negativa_ficha' => 'required',
            'documento_impugnado_original' => 'required',
            'fecha_demanda' => 'required',
            'numero_expediente' => 'required',

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
            'expedientes_id' => 'required',
            'fecha_de_ingreso' => 'required',
            'fecha_cedula_notificacion' => 'required',
            'numero_de_oficio' => 'required',
            'fecha_oficio' => 'required',
            'fecha_notificacion_admision' => 'required',
            'quien_recibio' => 'required',
            'numero_guia' => 'required',
            'negativa_ficha' => 'required',
            'documento_impugnado_original' => 'required',
            'fecha_demanda' => 'required',
            'numero_expediente' => 'required',
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
            'updated_at' => \Carbon\Carbon::now(),


        ]);

        $notification = array(
            'message' => "Proceso Actualizado Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('proceso.index')->with($notification);
    }

}
