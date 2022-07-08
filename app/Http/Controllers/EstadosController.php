<?php

namespace App\Http\Controllers;

use App\Exports\EstadosExport;
use Illuminate\Http\Request;
use App\Models\Estados;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class EstadosController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:estados-list|estados-created|estados-edit|estados-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:estados-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:estados-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:estados-delete', ['only' => ['destroy']]);
    }

    public function createPDF()
    {
        $datos = Estados::all();
        $pdf = PDF::loadView('admin.estados.createPDF', compact('datos'));
        return $pdf->download('Estados_PDF.pdf');
    }

    public function Index()
    {
        $estados = Estados::latest()->get();

        return View('admin.estados.index', compact('estados'));
    }

    public function post()
    {
        return View('admin.estados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required',
        ], [
            'Nombre.required' => 'El nombre del estado es requerido',
        ]);

        Estados::insert([
            'Nombre' => $request->Nombre,
            'created_at' => \Carbon\Carbon::now()
        ]);

        $notification  = array(
            'message' => "Estado Agregado Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('estados.index')->with($notification);
    }

    public function delete($id)
    {
        $estado = Estados::findOrFail($id);

        Estados::findOrFail($id)->delete();

        $notification = array(
            'message' => "Estado Eliminado Correctamente",
            'alert-type' => "error",
        );

        return redirect()->route('estados.index')->with($notification);
    }

    public function edit($id)
    {
        $estado = Estados::findOrFail($id);

        return View('admin.estados.update', compact('estado'));
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'Nombre' => 'required',
        ], [
            'Nombre.required' => 'El nombre del estado es requerido',
        ]);

        Estados::findOrFail($id)->update([
            'Nombre' => $request->Nombre,
            'updated_at' => \Carbon\Carbon::now()
        ]);

        $notification = array(
            'message' => "Estado Actualizado Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('estados.index')->with($notification);
    }

    public function export()
    {
        return Excel::download(new EstadosExport, "estados.xlsx");
    }
}
