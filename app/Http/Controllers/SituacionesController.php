<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Situaciones;
use Carbon\Carbon;

class SituacionesController extends Controller
{
    public function index() {
        $situaciones = Situaciones::latest()->get();
        return View("admin.situaciones.index" , compact("situaciones"));
    }

    public function post()
    {
        return View('admin.situaciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'expediente' => 'required',
            'situacion' => 'required',
            'fecha' => 'required',
            'comentario' => 'required',
        ], [
            'expediente.required' => 'El nombre del expediente es requerido',
            'situacion.required' => 'La situacion es requerida',
            'fecha.required' => 'La fecha es requerida',
            'comentario.required' => 'El comentario es requerido',
        ]);

        Situaciones::insert([
            'expediente' => $request->expediente,
            'situacion' => $request->situacion,
            'fecha' => $request->fecha,
            'comentario' => $request->comentario,
            'created_at' => Carbon::now()
        ]);

        $notification  = array(
            'message' => "Pais Agregado Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('situaciones.index')->with($notification);
    }

    public function delete($id)
    {
        $estado = Situaciones::findOrFail($id);

        Situaciones::findOrFail($id)->delete();

        $notification = array(
            'message' => "Situacion Eliminada Correctamente",
            'alert-type' => "error",
        );

        return redirect()->route('situaciones.index')->with($notification);
    }

    public function edit($id)
    {
        $situacion = Situaciones::findOrFail($id);

        return View('admin.situaciones.update', compact('situacion'));
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'expediente' => 'required',
            'situacion' => 'required',
            'fecha' => 'required',
            'comentario' => 'required',
        ], [
            'expediente.required' => 'El nombre del expediente es requerido',
            'situacion.required' => 'La situacion es requerida',
            'fecha.required' => 'La fecha es requerida',
            'comentario.required' => 'El comentario es requerido',
        ]);

        Situaciones::findOrFail($id)->update([
            'expediente' => $request->expediente,
            'situacion' => $request->situacion,
            'fecha' => $request->fecha,
            'comentario' => $request->comentario,
            'updated_at' => \Carbon\Carbon::now()
        ]);

        $notification = array(
            'message' => "Situacion Actualizada Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('situaciones.index')->with($notification);
    }
}
