<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Notificaciones;

class NotificacionesController extends Controller
{
    public function index() {
        $notificaciones = Notificaciones::latest()->get();
        return View("admin.notificaciones.index" , compact("notificaciones"));
    }

    public function post()
    {
        return View('admin.notificaciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ], [
            'nombre.required' => 'El nombre de la notificacion es requerida',
        ]);

        Notificaciones::insert([
            'nombre' => $request->nombre,
            'created_at' => Carbon::now()
        ]);

        $notification  = array(
            'message' => "Notificacion Agregada Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('notificaciones.index')->with($notification);
    }

    public function delete($id)
    {
        $estado = Notificaciones::findOrFail($id);

        Notificaciones::findOrFail($id)->delete();

        $notification = array(
            'message' => "Notificacion Eliminada Correctamente",
            'alert-type' => "error",
        );

        return redirect()->route('notificaciones.index')->with($notification);
    }

    public function edit($id)
    {
        $notificaciones = Notificaciones::findOrFail($id);

        return View('admin.notificaciones.update', compact('notificaciones'));
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'nombre' => 'required',
        ], [
            'nombre.required' => 'El nombre de la notificacion es requerida',
        ]);

        Notificaciones::findOrFail($id)->update([
            'nombre' => $request->nombre,
            'updated_at' => \Carbon\Carbon::now()
        ]);

        $notification = array(
            'message' => "Notificacion Actualizada Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('notificaciones.index')->with($notification);
    }

}
