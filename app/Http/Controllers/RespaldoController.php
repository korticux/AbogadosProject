<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Respaldo;

class RespaldoController extends Controller
{
    public function index() {
        $respaldo = Respaldo::latest()->get();
        return View("admin.respaldo.index" , compact("respaldo"));
    }
}
