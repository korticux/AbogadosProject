<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Estatus;

class EstatusController extends Controller
{
    public function index() {
        $estatus = Estatus::latest()->get();
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
            'message' => "Estatus Actualizada Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('estatus.index')->with($notification);
    }


}
