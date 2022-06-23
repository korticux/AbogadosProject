<?php

namespace App\Http\Controllers;
use App\Models\Cuentas;
use Illuminate\Http\Request;

class CuentasController extends Controller
{
    public function index() {
        $cuentas = Cuentas::latest()->get();
        return View("admin.cuentas.index" , compact("cuentas"));
    }
}
