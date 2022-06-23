<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Festivos;


class FestivoController extends Controller
{
    public function index() {
        $festivos = Festivos::latest()->get();
        return View("admin.festivos.index" , compact("festivos"));
    }
}
