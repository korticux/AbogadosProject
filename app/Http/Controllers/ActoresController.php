<?php

namespace App\Http\Controllers;
use App\Models\Actores;
use Illuminate\Http\Request;

class ActoresController extends Controller
{
    public function index() {
        $actores = Actores::latest()->get();
        return View("admin.actores.index" , compact("actores"));
    }

    public function post()
    {
        return View('admin.actores.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'curp' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
            'nocliente' => 'required',
        ]);

        Actores::insert([
            'nombre' => $request->nombre,
            'curp' => $request->curp,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'nocliente' => $request->nocliente,
            'created_at' => \Carbon\Carbon::now()
        ]);

        return redirect()->route('actores.index');
    }
}
