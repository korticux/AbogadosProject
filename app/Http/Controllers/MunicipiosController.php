<?php

namespace App\Http\Controllers;

use App\Exports\MunicipiosExport;
use App\Models\Estados;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Municipios;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class MunicipiosController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:municipios-list|municipios-create|municipios-edit|municipios-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:municipios-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:municipios-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:municipios-delete', ['only' => ['destroy']]);
    }

    public function createPDF(){
        $datos = Municipios::all();
        $pdf = PDF::loadView('admin.municipios.createPDF', compact('datos'));
        return $pdf->download('Municipios_PDF.pdf');
    }

    public function index() {
        $municipios = Municipios::latest()->paginate(5);
        return View("admin.municipios.index" , compact("municipios"));
    }

    public function post()
    {
        $estados = Estados::latest()->get();
        return View('admin.municipios.create', compact("estados"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ], [
            'nombre.required' => 'El nombre del municipio es requerido',
        ]);

        Municipios::insert([
            'nombre' => $request->nombre,
            'created_at' => Carbon::now(),
            'estado_id' => $request->estado_id,
        ]);

        $notification  = array(
            'message' => "Municipio Agregado Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('municipios.index')->with($notification);
    }

    public function delete($id)
    {

        Municipios::findOrFail($id)->delete();

        $notification = array(
            'message' => "Municipio Eliminado Correctamente",
            'alert-type' => "error",
        );

        return redirect()->route('municipios.index')->with($notification);
    }

    public function edit($id)
    {
        $municipio = Municipios::findOrFail($id);
        $estados = Estados::latest()->get();
        return View('admin.municipios.update', compact('municipio', 'estados'));
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'nombre' => 'required',
        ], [
            'nombre.required' => 'El nombre del municipio es requerido',
        ]);

        Municipios::findOrFail($id)->update([
            'nombre' => $request->nombre,
            'updated_at' => \Carbon\Carbon::now(),
            'estado_id' => $request->estado_id,

        ]);

        $notification = array(
            'message' => "Municipio Actualizado Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('municipios.index')->with($notification);
    }

    public function export()
    {
        return Excel::download(new MunicipiosExport, "municipios.xlsx");
    }

}
