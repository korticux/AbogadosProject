<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PagosCobranzas;
use App\Models\Cobranza;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PagosCobranzaController extends Controller
{
    public function index(Request $request) {

        $pagoscobranzas = PagosCobranzas::latest()->paginate(100);
    }

    public function post()
    {
        $cobranzas = Cobranza::latest()->get();
        return View('admin.pagoscobranza.create', compact("cobranzas"));
    }

    public function store(Request $request)
    {
        $cobranzas = Cobranza::latest()->where('id','=',$request->cobranza_id)->get();
        $montot = $cobranzas[0]->total - $cobranzas[0]->monto_percibido;


        $request->validate([
            'nombre_pagos' => '',
            'cobranza_id' => '',
            'monto' => "required|numeric|lte:{$montot}",
            'comentario' => '',

        ], [

            'cobranza_id.required' => 'El medio de cobranza es requerido',
            'nombre_pagos.required' => 'El nombre del pago es requerido',
            'monto.lte' => "El pago debe ser menor a {$montot}",
            'comentario.required' => 'El comentario es requerido',

        ]);

        PagosCobranzas::insert([
            'nombre_pagos' => $request->nombre_pagos,
            'cobranza_id' => $request->cobranza_id,
            'monto' => $request->monto,
            'comentario' => $request->comentario,

            'created_at' => \Carbon\Carbon::now()
        ]);

        $mt = DB::table('pagos_cobranzas')->where('cobranza_id', '=', $request->cobranza_id)->get();
        $mtt = $mt->sum('monto');
        Cobranza::findOrFail($request->cobranza_id)->update([
            'monto_percibido' => $mtt,
        ]);

        $notification  = array(
            'message' => "Pago  Agregado Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('cobranza.index')->with($notification);
    }

    public function delete($id)
    {
        $idc = PagosCobranzas::where("id",'=',$id)->get();
        $idcc = $idc[0]->cobranza_id;
        PagosCobranzas::findOrFail($id)->delete();

        $mt = DB::table('pagos_cobranzas')->where('cobranza_id', '=', $idcc)->get();
        $mtt = $mt->sum('monto');

            DB::table("cobranzas")->where('id','=',$idcc)->update([
                'monto_percibido' => $mtt,
            ]);


        $notification = array(
            'message' => "Pago Eliminado Correctamente",
            'alert-type' => "error",
        );


        return redirect()->route('cobranza.edit', $idcc)->with($notification);
    }

    public function edit($id)
    {
        $pagoscobranzas = PagosCobranzas::findOrFail($id);
        $cobranzas = Cobranza::latest()->get();
        return View('admin.pagoscobranza.update', compact('cobranzas', 'pagoscobranzas'));
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'nombre_pagos' => '',
            'cobranza_id' => '',
            'monto' => '',
            'comentario' => '',
        ], [
            'cobranza_id.required' => 'El medio de cobranza es requerido',
            'nombre_pagos.required' => 'El nombre del pago es requerido',
            'monto.required' => 'El monto es requerido',
            'comentario.required' => 'El comentario es requerido',
        ]);

        PagosCobranzas::findOrFail($id)->update([
            'nombre_pagos' => $request->nombre_pagos,
            'cobranza_id' => $request->cobranza_id,
            'monto' => $request->monto,
            'comentario' => $request->comentario,
            'updated_at' => Carbon::now(),
        ]);

        $mt = DB::table('pagos_cobranzas')->where('cobranza_id', '=', $request->cobranza_id)->get();
        $mtt = $mt->sum('monto');
        if($mtt > 0){
        Cobranza::findOrFail($request->cobranza_id)->update([
            'monto_percibido' => $mtt,
        ]);
        }elseif($mtt == 0){

        }


        $notification = array(
            'message' => "Pago Actualizado Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('cobranza.index')->with($notification);
    }
}
