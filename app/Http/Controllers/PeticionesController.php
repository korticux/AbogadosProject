<?php

namespace App\Http\Controllers;

use App\Exports\PeticionesExport;
use Illuminate\Http\Request;
use App\Models\Peticiones;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class PeticionesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:peticiones-list|peticiones-created|peticiones-edit|peticiones-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:peticiones-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:peticiones-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:peticiones-delete', ['only' => ['destroy']]);
    }

    public function createPDF()
    {
        $datos = Peticiones::all();
        $pdf = PDF::loadView('admin.peticiones.createPDF', compact('datos'));
        return $pdf->download('Peticiones_PDF.pdf');
    }

    public function index()
    {
        $peticiones = Peticiones::latest()->paginate(100);
        return View("admin.peticiones.index", compact("peticiones"));
    }

    public function post()
    {
        return View('admin.peticiones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'lugar' => 'required',
            'created_at' => 'required',
        ], [
            'lugar.required' => 'El nombre de la peticion es requerida',
            'created_at.required' => 'El nombre de la peticion es requerida',
        ]);

        Peticiones::insert([
            'lugar' => $request->lugar,
            'created_at' => Carbon::now()
        ]);

        $notification  = array(
            'message' => "Peticion Agregada Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('peticiones.index')->with($notification);
    }

    public function delete($id)
    {
        $estado = Peticiones::findOrFail($id);

        Peticiones::findOrFail($id)->delete();

        $notification = array(
            'message' => "Peticion Eliminada Correctamente",
            'alert-type' => "error",
        );

        return redirect()->route('peticiones.index')->with($notification);
    }

    public function edit($id)
    {
        $peticion = Peticiones::findOrFail($id);

        return View('admin.peticiones.update', compact('peticion'));
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'lugar' => 'required',
            'created_at' => 'required',
        ], [
            'lugar.required' => 'El nombre de la peticion es requerida',
            'created_at.required' => 'El nombre de la peticion es requerida',
        ]);
        Peticiones::findOrFail($id)->update([
            'lugar' => $request->lugar,
            'created_at' => $request->created_at
        ]);

        $notification = array(
            'message' => "Peticion Actualizada Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('peticiones.index')->with($notification);
    }

    public function export()
    {
        return Excel::download(new PeticionesExport, "peticiones.xlsx");
    }
}
