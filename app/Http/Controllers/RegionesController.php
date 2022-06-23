<?php

namespace App\Http\Controllers;
use App\Models\Regiones;

use Illuminate\Http\Request;

class RegionesController extends Controller
{
    public function index() {
        $regiones = Regiones::latest()->get();
        return View("admin.regiones.index" , compact("regiones"));
    }
}
