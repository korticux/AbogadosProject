<?php

namespace App\Http\Controllers;

use App\Models\Actores;
use App\Models\Estados;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ActoresController extends Controller
{
    public function index()
    {
        $actores = Actores::latest()->get();
        return View("admin.actores.index", compact("actores"));
    }

    public function post()
    {
        $estados = Estados::latest()->get();
        return View('admin.actores.create', compact('estados'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'curp' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
            'nocliente' => 'required',
            'domicilio' => 'required',
            'ciudad' => 'required',
            'comentarios' => 'required',
            'nacimiento' => 'required',
            'estado_id' => 'required',
        ]);

        Actores::insert([
            'nombre' => $request->nombre,
            'curp' => $request->curp,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'nocliente' => $request->nocliente,
            'nacimiento' => $request->nacimiento,
            'domicilio' => $request->domicilio,
            'rfc' => $request->rfc,
            'estado_id' => $request->estado_id,
            'ciudad' => $request->ciudad,
            'comentarios' => $request->comentarios,
            'created_at' => \Carbon\Carbon::now()
        ]);

        $notification  = array(
            'message' => "Actor Agregado Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('actores.index')->with($notification);
    }

    public function delete($id)
    {
        $estado = Actores::findOrFail($id);

        Actores::findOrFail($id)->delete();

        $notification = array(
            'message' => "Actor Eliminado Correctamente",
            'alert-type' => "error",
        );

        return redirect()->route('actores.index')->with($notification);
    }

    public function edit($id)
    {
        $actor = Actores::findOrFail($id);
        $estados = Estados::latest()->get();

        return View('admin.actores.update', compact('actor','estados'));
    }

    public function update($id, Request $request)
    {

        $validatedData = $request->validate([
            'nombre' => 'required',
            'curp' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
            'nocliente' => 'required',
            'domicilio' => 'required',
            'ciudad' => 'required',
            'comentarios' => 'required',
            'nacimiento' => 'required',
            'estado_id' => 'required',
        ]);

        Actores::findOrFail($id)->update([
            'nombre' => $request->nombre,
            'curp' => $request->curp,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'nocliente' => $request->nocliente,
            'nacimiento' => $request->nacimiento,
            'domicilio' => $request->domicilio,
            'rfc' => $request->rfc,
            'estado_id' => $request->estado_id,
            'ciudad' => $request->ciudad,
            'comentarios' => $request->comentarios,
            'updated_at' => \Carbon\Carbon::now()
        ]);

        $notification  = array(
            'message' => "Actor Actualizado Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('actores.index')->with($notification);
    }
}
