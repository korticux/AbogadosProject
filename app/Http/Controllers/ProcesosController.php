<?php

namespace App\Http\Controllers;
use App\Models\Proceso;

use Illuminate\Http\Request;

class ProcesosController extends Controller
{
    public function index() {
        $procesos = Proceso::latest()->get();
        return View("admin.procesos.index" , compact("procesos"));
    }
}
