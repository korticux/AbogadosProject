<?php

namespace App\Http\Controllers;

use App\Exports\PaisesExport;
use Illuminate\Http\Request;
use App\Models\Paises;
use PDF;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Psy\ExecutionLoopClosure;

class PaisesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:paises-list|paises-created|paises-edit|paises-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:paises-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:paises-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:paises-delete', ['only' => ['destroy']]);
    }

    public function createPDF(){
        $datos = Paises::all();
        $pdf = PDF::loadView('admin.paises.createPDF', compact('datos'));
        return $pdf->download('Paises_PDF.pdf');
    }

    public function index() {
        $paises = Paises::latest()->get();
        return View("admin.paises.index" , compact("paises"));
    }

    public function post()
    {
        return View('admin.paises.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ], [
            'nombre.required' => 'El nombre del pais es requerido',
        ]);

        Paises::insert([
            'nombre' => $request->nombre,
            'created_at' => Carbon::now()
        ]);

        $notification  = array(
            'message' => "Pais Agregado Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('paises.index')->with($notification);
    }

    public function delete($id)
    {
        $estado = Paises::findOrFail($id);

        Paises::findOrFail($id)->delete();

        $notification = array(
            'message' => "Pais Eliminada Correctamente",
            'alert-type' => "error",
        );

        return redirect()->route('paises.index')->with($notification);
    }

    public function edit($id)
    {
        $pais = Paises::findOrFail($id);

        return View('admin.paises.update', compact('pais'));
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'nombre' => 'required',
        ], [
            'nombre.required' => 'El nombre del pais es requerido',
        ]);

        Paises::findOrFail($id)->update([
            'nombre' => $request->nombre,
            'updated_at' => \Carbon\Carbon::now()
        ]);

        $notification = array(
            'message' => "Pais Actualizada Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('paises.index')->with($notification);
    }

    public function export()
    {
        return Excel::download(new PaisesExport, "paises.xlsx");
    }
}
