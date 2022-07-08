<?php

namespace App\Http\Controllers;
use App\Exports\TramitesExport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Tramites;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class TramitesController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:tramites-list|tramites-create|tramites-edit|tramites-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:tramites-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:tramites-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:tramites-delete', ['only' => ['destroy']]);
    }
    public function createPDF(){
        $datos = Tramites::all();
        $pdf = PDF::loadView('admin.tramites.createPDF', compact('datos'));
        return $pdf->download('Tramites_PDF.pdf');
    }

    public function index() {
        $tramites = Tramites::latest()->paginate(5);
        return View("admin.tramites.index" , compact("tramites"));
    }

    public function post()
    {
        return View('admin.tramites.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ], [
            'nombre.required' => 'El nombre del tramite es requerido',
        ]);

        Tramites::insert([
            'nombre' => $request->nombre,
            'created_at' => Carbon::now()
        ]);

        $notification  = array(
            'message' => "Tramite Agregado Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('tramites.index')->with($notification);
    }


    public function delete($id)
    {
        $estado = Tramites::findOrFail($id);

        Tramites::findOrFail($id)->delete();

        $notification = array(
            'message' => "Tramite Eliminado Correctamente",
            'alert-type' => "error",
        );

        return redirect()->route('tramites.index')->with($notification);
    }

    public function edit($id)
    {
        $tramites = Tramites::findOrFail($id);

        return View('admin.tramites.update', compact('tramites'));
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'nombre' => 'required',
        ], [
            'nombre.required' => 'El nombre del tramite es requerido',
        ]);

        Tramites::findOrFail($id)->update([
            'nombre' => $request->nombre,
            'updated_at' => \Carbon\Carbon::now()
        ]);

        $notification = array(
            'message' => "Tramite Actualizado Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('tramites.index')->with($notification);
    }

    public function export()
    {
        return Excel::download(new TramitesExport, "Tramites.xlsx");
    }
}
