<?php

namespace App\Http\Controllers;

use App\Exports\CobranzasExport;
use App\Models\Cuentas;
use Illuminate\Http\Request;
use App\Models\Cobranza;
use Carbon\Carbon;
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
        $cobranzas = Cobranza::latest()->get();
        return View("admin.cobranza.index" , compact("cobranzas"));
    }

    public function post()
    {
        $cuentas = Cuentas::latest()->get();
        return View('admin.cobranza.create', compact("cuentas"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cobranza' => 'required',
            'tipo' => 'required',
            'cuenta_id' => 'required',
            'referencia' => 'required',
            'fecha' => 'required',
            'monto' => 'required',
        ], [
            'cobranza.required' => 'El medio de cobranza es requerido',
            'tipo.required' => 'El tipo de cobranza es requerido',
            'cuenta_id.required' => 'Seleccionar la cuenta es requerida',
            'referencia.required' => 'Se necesita una referencia',
            'fecha.required' => 'La fecha es requerida',
            'monto.required' => 'El monto debe ser especifico',

        ]);

        Cobranza::insert([
            'cobranza' => $request->cobranza,
            'tipo' => $request->tipo,
            'cuenta_id' => $request->cuenta_id,
            'referencia' => $request->referencia,
            'fecha' => $request->fecha,
            'monto' => $request->monto,
            'created_at' => Carbon::now(),
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

    public function edit($id)
    {
        $cobranza = Cobranza::findOrFail($id);
        $cuentas = Cuentas::latest()->get();
        return View('admin.cobranza.update', compact('cobranza', 'cuentas'));
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'cobranza' => 'required',
            'tipo' => 'required',
            'cuenta_id' => 'required',
            'referencia' => 'required',
            'fecha' => 'required',
            'monto' => 'required',
        ], [
            'cobranza.required' => 'El medio de cobranza es requerido',
            'tipo.required' => 'El tipo de cobranza es requerido',
            'cuenta_id.required' => 'Seleccionar la cuenta es requerida',
            'referencia.required' => 'Se necesita una referencia',
            'fecha.required' => 'La fecha es requerida',
            'monto.required' => 'El monto debe ser especifico',
        ]);

        Cobranza::findOrFail($id)->update([
            'cobranza' => $request->cobranza,
            'tipo' => $request->tipo,
            'cuenta_id' => $request->cuenta_id,
            'referencia' => $request->referencia,
            'fecha' => $request->fecha,
            'monto' => $request->monto,
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
