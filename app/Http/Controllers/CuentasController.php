<?php

namespace App\Http\Controllers;
use App\Models\Cuentas;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CuentasController extends Controller
{
    public function index() {
        $cuentas = Cuentas::latest()->get();
        return View("admin.cuentas.index" , compact("cuentas"));
    }

    public function post()
    {
        $cuentas = Cuentas::latest()->get();
        return View('admin.cuentas.create', compact("cuentas"));
    }

    public function store(Request $request)
    {
        $request->validate([
            'banco' => 'required',
            'cuenta' => 'required',
        ], [
            'banco.required' => 'El nombre del banco es requerido',
            'cuenta.required' => 'El nombre de la cuenta es requerido',

        ]);

        Cuentas::insert([
            'banco' => $request->banco,
            'cuenta' => $request->cuenta,
            'created_at' => Carbon::now(),
        ]);

        $notification  = array(
            'message' => "Cuenta Agregada Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('cuentas.index')->with($notification);
    }

    public function delete($id)
    {

        Cuentas::findOrFail($id)->delete();

        $notification = array(
            'message' => "Cuenta Eliminada Correctamente",
            'alert-type' => "error",
        );

        return redirect()->route('cuentas.index')->with($notification);
    }

    public function edit($id)
    {
        $cuenta = Cuentas::findOrFail($id);
        return View('admin.cuentas.update', compact('cuenta'));
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'banco' => 'required',
            'cuenta' => 'required',
        ], [
            'banco.required' => 'El nombre del banco es requerido',
            'cuenta.required' => 'El nombre de la cuenta es requerido',
        ]);

        Cuentas::findOrFail($id)->update([
            'banco' => $request->banco,
            'cuenta' => $request->cuenta,
            'updated_at' => \Carbon\Carbon::now(),

        ]);

        $notification = array(
            'message' => "Cuenta Actualizada Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('cuentas.index')->with($notification);
    }


}
