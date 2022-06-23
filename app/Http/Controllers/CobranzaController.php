<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cobranza;

class CobranzaController extends Controller
{
    public function index() {
        $cobranza = Cobranza::latest()->get();
        return View("admin.cobranza.index" , compact("cobranza"));
    }
}
