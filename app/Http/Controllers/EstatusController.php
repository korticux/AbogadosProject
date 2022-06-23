<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estatus;

class EstatusController extends Controller
{
    public function index() {
        $estatus = Estatus::latest()->get();
        return View("admin.estatus.index" , compact("estatus"));
    }
}
