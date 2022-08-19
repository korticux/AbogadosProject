<?php

namespace App\Http\Controllers;

use App\Exports\CobranzasExport;
use App\Models\ArchivosCobranza;
use App\Models\Cuentas;
use App\Models\Actores;
use Illuminate\Http\Request;
use App\Models\Cobranza;
use App\Models\PagosCobranzas;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class CobranzaController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:cobranza-list|cobranza-created|cobranza-edit|cobranza-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:cobranza-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:cobranza-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:cobranza-delete', ['only' => ['destroy']]);
    }

    public function createPDF(){
        $datos = Cobranza::all();
        $pdf = PDF::loadView('admin.cobranza.createPDF', compact('datos'));
        return $pdf->download('Cobranza_PDF.pdf');
    }

    public function index() {
        $cobranzas = Cobranza::latest()->paginate(100);
        return View("admin.cobranza.index" , compact("cobranzas"));
    }

    public function post()
    {
        $cuentas = Cuentas::latest()->get();
        $actores = Actores::latest()->get();
        return View('admin.cobranza.create', compact("cuentas","actores"));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'cobranza' => '',
            'tipo' => '',
            'cuenta_id' => '',
            'referencia' => '',
            'fecha' => '',
            'total' => '',
            'actor_id' => '',
            'monto_percibido' => '',
        ], [
            'cobranza.required' => 'El medio de cobranza es requerido',
            'tipo.required' => 'El tipo de cobranza es requerido',
            'cuenta_id.required' => 'Seleccionar la cuenta es requerida',
            'referencia.required' => 'Se necesita una referencia',
            'fecha.required' => 'La fecha es requerida',
            'total.required' => 'El total debe ser especifico',
            'actor_id.required' => 'Seleccionar el actor es requerido',
            'monto_percibido.required' => 'monto percibido es requerido',

        ]);


        $data['created_at'] = Carbon::now();
        $new_cobranza = Cobranza::create($data);

        if ($request->has('nombre_archivo')) {
            foreach ($request->file('nombre_archivo') as $documento) {
                $documento_nname = $data['cobranza'] . '-documento-' . time() . rand(1, 1000) . '.' . $documento->extension();
                $documento->move(public_path('cobranza_documentos'), $documento_nname);
                ArchivosCobranza::create([
                    'cobranza_id' => $new_cobranza->id,
                    'nombre_archivo' => $documento_nname,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }


        PagosCobranzas::create([
            'nombre_pagos' => $new_cobranza->cobranza . '-' . 'pago',
            'cobranza_id' => $new_cobranza->id,
            'created_at' => Carbon::now()
        ]);



        $notification  = array(
            'message' => "Cobranza Agregada Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('cobranza.index')->with($notification);
    }


    public function delete($id)
    {

        Cobranza::findOrFail($id)->delete();

        $notification = array(
            'message' => "Cobranza Eliminada Correctamente",
            'alert-type' => "error",
        );

        return redirect()->route('cobranza.index')->with($notification);
    }

    public function deleteCobranzas($id, $CobranzasId)
    {
        ArchivosCobranza::where("id", $id)->where("cobranza_id", $CobranzasId)->delete();

        $notification = array(
            'message' => "Archivo Cobranza Eliminado Correctamente",
            'alert-type' => "error",
        );

        return redirect()->route('cobranza.index')->with($notification);
    }

    public function edit($id)
    {
        $cobranza = Cobranza::findOrFail($id);
        $cuentas = Cuentas::latest()->get();
        $actores = Actores::latest()->get();
        $pagoscobranzas = DB::table('pagos_cobranzas')->where('cobranza_id', $id)->get();
        $archivos_cobranzas = ArchivosCobranza::where('cobranza_id', $cobranza->id)->get();
        return View('admin.cobranza.update', compact('cobranza', 'cuentas', 'archivos_cobranzas', 'actores', 'pagoscobranzas'));
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'cobranza' => '',
            'tipo' => '',
            'cuenta_id' => '',
            'referencia' => '',
            'fecha' => '',
            'total' => '',
            'actor_id' => '',
            'monto_percibido' => '',
        ], [
            'cobranza.required' => 'El medio de cobranza es requerido',
            'tipo.required' => 'El tipo de cobranza es requerido',
            'cuenta_id.required' => 'Seleccionar la cuenta es requerida',
            'referencia.required' => 'Se necesita una referencia',
            'fecha.required' => 'La fecha es requerida',
            'total.required' => 'El total debe ser especifico',
            'actor_id.required' => 'Seleccionar el actor es requerido',
            'monto_percibido.required' => 'monto percibido es requerido',
        ]);

        Cobranza::findOrFail($id)->update([
            'cobranza' => $request->cobranza,
            'tipo' => $request->tipo,
            'cuenta_id' => $request->cuenta_id,
            'referencia' => $request->referencia,
            'fecha' => $request->fecha,
            'total' => $request->total,
            'actor_id' => $request->actor_id,
            'monto_percibido' => $request->monto_percibido,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => "Cobranza Actualizada Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('cobranza.index')->with($notification);
    }

    public function export()
    {
        return Excel::download(new CobranzasExport, "cobranzas.xlsx");
    }

}
