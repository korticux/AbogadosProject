<?php

namespace App\Http\Controllers;

use App\Exports\DependenciasExport;
use App\Models\Dependencias;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class DependenciasController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:dependencias-list|dependencias-created|dependencias-edit|dependencias-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:dependencias-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:dependencias-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:dependencias-delete', ['only' => ['destroy']]);
    }

    public function createPDF(){
        $datos = Dependencias::all();
        $pdf = PDF::loadView('admin.dependencias.createPDF', compact('datos'));
        return $pdf->download('Dependencias_PDF.pdf');
    }

    public function index() {
        $dependencias = Dependencias::latest()->paginate(100);
        return View("admin.dependencias.index" , compact("dependencias"));
    }

    public function post()
    {
        return View('admin.dependencias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ], [
            'nombre.required' => 'El nombre del estado es requerido',
        ]);

        Dependencias::insert([
            'nombre' => $request->nombre,
            'created_at' => Carbon::now()
        ]);

        $notification  = array(
            'message' => "Dependencia Agregada Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('dependencias.index')->with($notification);
    }

    public function delete($id)
    {
        $estado = Dependencias::findOrFail($id);

        Dependencias::findOrFail($id)->delete();

        $notification = array(
            'message' => "Dependencia Eliminada Correctamente",
            'alert-type' => "error",
        );

        return redirect()->route('dependencias.index')->with($notification);
    }

    public function edit($id)
    {
        $dependencia = Dependencias::findOrFail($id);

        return View('admin.dependencias.update', compact('dependencia'));
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'nombre' => 'required',
        ], [
            'nombre.required' => 'El nombre del dependencia es requerido',
        ]);

        Dependencias::findOrFail($id)->update([
            'nombre' => $request->nombre,
            'updated_at' => \Carbon\Carbon::now()
        ]);

        $notification = array(
            'message' => "Dependencia Actualizada Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('dependencias.index')->with($notification);
    }

    public function export()
    {
        return Excel::download(new DependenciasExport, "dependencias.xlsx");
    }
}
