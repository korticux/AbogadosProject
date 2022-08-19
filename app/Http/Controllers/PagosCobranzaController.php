<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PagosCobranzas;
use App\Models\Cobranza;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PagosCobranzaController extends Controller
{
    public function index() {
        $pagoscobranzas = PagosCobranzas::latest()->paginate(100);
    }

    public function post()
    {
        $cobranzas = Cobranza::latest()->get();
        return View('admin.pagoscobranza.create', compact("cobranzas"));
    }

    public function store(Request $request)
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

        Cobranza::findOrFail($request->cobranza_id)->update([
            'monto_percibido' => $request->monto,
        ]);

        PagosCobranzas::insert([
            'nombre_pagos' => $request->nombre_pagos,
            'cobranza_id' => $request->cobranza_id,
            'monto' => $request->monto,
            'comentario' => $request->comentario,

            'created_at' => \Carbon\Carbon::now()
        ]);



        $notification  = array(
            'message' => "Pago  Agregado Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('cobranza.index')->with($notification);
    }

    public function delete($id)
    {

        PagosCobranzas::findOrFail($id)->delete();

        $notification = array(
            'message' => "Pago Eliminado Correctamente",
            'alert-type' => "error",
        );

        return redirect()->route('cobranza.index')->with($notification);
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

        Cobranza::findOrFail($request->cobranza_id)->update([
            'monto_percibido' => $request->monto
        ]);

        PagosCobranzas::insert([
            'nombre_pagos' => $request->nombre_pagos,
            'cobranza_id' => $request->cobranza_id,
            'monto' => $request->monto,
            'comentario' => $request->comentario,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => "Pago Actualizado Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('cobranza.index')->with($notification);
    }
}
