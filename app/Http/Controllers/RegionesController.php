<?php

namespace App\Http\Controllers;

use App\Exports\RegionesExport;
use App\Models\Regiones;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class RegionesController extends Controller
{

    public function createPDF(){
        $datos = Regiones::all();
        $pdf = PDF::loadView('admin.regiones.createPDF', compact('datos'));
        return $pdf->download('Regiones_PDF.pdf');
    }

    public function index()
    {
        $regiones = Regiones::latest()->get();
        return View("admin.regiones.index", compact("regiones"));
    }

    public function post()
    {
        $regiones = Regiones::latest()->get();
        return View('admin.regiones.create', compact("regiones"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required',
            'nombre' => 'required',

        ], [
            'numero.required' => 'El numero es requerido',
            'nombre.required' => 'El nombre es requerido',
        ]);

        Regiones::insert([
            'numero' => $request->numero,
            'nombre' => $request->nombre,
            'created_at' => Carbon::now(),
        ]);

        $notification  = array(
            'message' => "Region Agregada Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('regiones.index')->with($notification);
    }


    public function delete($id)
    {

        Regiones::findOrFail($id)->delete();

        $notification = array(
            'message' => "Region Eliminada Correctamente",
            'alert-type' => "error",
        );

        return redirect()->route('regiones.index')->with($notification);
    }

    public function edit($id)
    {
        $regiones = Regiones::findOrFail($id);
        return View('admin.regiones.update', compact("regiones"));
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'numero' => 'required',
            'nombre' => 'required',

        ], [
            'numero.required' => 'El numero es requerido',
            'nombre.required' => 'El nombre es requerido',
        ]);


        Regiones::findOrFail($id)->update([
            'numero' => $request->numero,
            'nombre' => $request->nombre,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => "Region Actualizada Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('regiones.index')->with($notification);
    }

    public function export()
    {
        return Excel::download(new RegionesExport, "regiones.xlsx");
    }
}
