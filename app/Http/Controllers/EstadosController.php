<?php

namespace App\Http\Controllers;

use App\Exports\EstadosExport;
use Illuminate\Http\Request;
use App\Models\Estados;
use Maatwebsite\Excel\Facades\Excel;

class EstadosController extends Controller
{
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
