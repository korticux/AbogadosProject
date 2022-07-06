<?php

namespace App\Http\Controllers;

use App\Exports\FestivosExport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Festivos;
use Maatwebsite\Excel\Facades\Excel;

class FestivoController extends Controller
{
    public function index() {
        $festivos = Festivos::latest()->get();
        return View("admin.festivos.index" , compact("festivos"));
    }
    public function post()
    {
        $festivos = Festivos::latest()->get();
        return View('admin.festivos.create', compact("festivos"));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'fecha' => 'required',
        ], [
            'nombre.required' => 'El nombre del festivo es requerido',
            'fecha.required' => 'La fecha del festivo es requerida',

        ]);

        Festivos::insert([
            'nombre' => $request->nombre,
            'created_at' => Carbon::now(),
            'fecha' => $request->fecha,
        ]);

        $notification  = array(
            'message' => "Festivo Agregado Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('festivos.index')->with($notification);
    }


    public function delete($id)
    {

        Festivos::findOrFail($id)->delete();

        $notification = array(
            'message' => "Festivo Eliminado Correctamente",
            'alert-type' => "error",
        );

        return redirect()->route('festivos.index')->with($notification);
    }

    public function edit($id)
    {
        $festivo = Festivos::findOrFail($id);
        return View('admin.festivos.update', compact('festivo'));
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'nombre' => 'required',
        ], [
            'nombre.required' => 'El nombre del festivo es requerido',
        ]);

        Festivos::findOrFail($id)->update([
            'nombre' => $request->nombre,
            'updated_at' => \Carbon\Carbon::now(),
            'fecha' => $request->fecha,

        ]);

        $notification = array(
            'message' => "Festivo Actualizado Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('festivos.index')->with($notification);
    }

    public function export()
    {
        return Excel::download(new FestivosExport, "festivos.xlsx");
    }
}
