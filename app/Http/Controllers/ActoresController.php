<?php

namespace App\Http\Controllers;
use App\Models\Actores;
use Illuminate\Http\Request;

class ActoresController extends Controller
{
    public function index() {
        $actores = Actores::latest()->get();
        return View("admin.actores.index" , compact("actores"));
    }
}
