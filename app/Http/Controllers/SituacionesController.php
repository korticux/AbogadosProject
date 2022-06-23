<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Situaciones;

class SituacionesController extends Controller
{
    public function index() {
        $situaciones = Situaciones::latest()->get();
        return View("admin.situaciones.index" , compact("situaciones"));
    }
}
