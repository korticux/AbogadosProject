<?php

namespace App\Http\Controllers;

use App\Exports\EstatusExport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Estatus;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class EstatusController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:estatus-list|estatus-created|estatus-edit|estatus-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:estatus-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:estatus-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:estatus-delete', ['only' => ['destroy']]);
    }

    public function createPDF(){
        $datos = Estatus::all();
        $pdf = PDF::loadView('admin.estatus.createPDF', compact('datos'));
        return $pdf->download('Estatus_PDF.pdf');
    }

    public function index() {
        $estatus = Estatus::latest()->paginate(100);
        return View("admin.estatus.index" , compact("estatus"));
    }

    public function post()
    {
        return View('admin.estatus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ], [
            'nombre.required' => 'El nombre del estatus es requerido',
        ]);

        Estatus::insert([
            'nombre' => $request->nombre,
            'created_at' => Carbon::now()
        ]);

        $notification  = array(
            'message' => "Estatus Agregado Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('estatus.index')->with($notification);
    }

    public function delete($id)
    {
        $estado = Estatus::findOrFail($id);

        Estatus::findOrFail($id)->delete();

        $notification = array(
            'message' => "Estatus Eliminada Correctamente",
            'alert-type' => "error",
        );

        return redirect()->route('estatus.index')->with($notification);
    }

    public function edit($id)
    {
        $estatus = Estatus::findOrFail($id);

        return View('admin.estatus.update', compact('estatus'));
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'nombre' => 'required',
        ], [
            'nombre.required' => 'El nombre del estatus es requerido',
        ]);

        Estatus::findOrFail($id)->update([
            'nombre' => $request->nombre,
            'updated_at' => \Carbon\Carbon::now()
        ]);

        $notification = array(
            'message' => "Estatus Actualizado Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('estatus.index')->with($notification);
    }

    public function export()
    {
        return Excel::download(new EstatusExport, "estatus.xlsx");
    }

    public function downloadPdf()
    {
        $estatus = Estatus::all();

        $pdf = PDF::loadView("admin.estatus.estatusPdf", compact("estatus"));

        return $pdf->download("estatus.pdf");
    }

}
