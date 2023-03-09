<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Models\Buscador;

class BuscadorController extends Controller
{

    public function index () {
        $buscador = Buscador::latest()->paginate(5000);
        return View("admin.buscador.index", compact("buscador"));
    }


}
