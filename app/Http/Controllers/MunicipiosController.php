<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipios;

class MunicipiosController extends Controller
{
    public function index() {
        $municipios = Municipios::latest()->get();
        return View("admin.municipios.index" , compact("municipios"));
    }
}
