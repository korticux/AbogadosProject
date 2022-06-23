<?php

namespace App\Http\Controllers;
use App\Models\Dependencias;
use Illuminate\Http\Request;

class DependenciasController extends Controller
{
    public function index() {
        $dependencias = Dependencias::latest()->get();
        return View("admin.dependencias.index" , compact("dependencias"));
    }
}
