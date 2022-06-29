<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Tramites;

class TramitesController extends Controller
{
    public function index() {
        $tramites = Tramites::latest()->get();
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
}
