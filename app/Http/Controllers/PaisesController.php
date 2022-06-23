<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paises;

class PaisesController extends Controller
{
    public function index() {
        $paises = Paises::latest()->get();
        return View("admin.paises.index" , compact("paises"));
    }
}
