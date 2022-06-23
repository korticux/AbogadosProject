<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estados;

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
        ]);

        Estados::insert([
            'Nombre' => $request->Nombre,
            'created_at' => \Carbon\Carbon::now()
        ]);

        return redirect()->route('estados.index');
    }
}
