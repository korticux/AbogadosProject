<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expedientes;

class ExpedientesController extends Controller
{
    public function index() {
        $expedientes = Expedientes::latest()->get();
        return View("admin.expedientes.index" , compact("expedientes"));
    }
}
