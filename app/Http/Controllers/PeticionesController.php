<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peticiones;

class PeticionesController extends Controller
{
    public function index() {
        $peticiones = Peticiones::latest()->get();
        return View("admin.peticiones.index" , compact("peticiones"));
    }
}
