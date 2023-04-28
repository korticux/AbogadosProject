<?php

namespace App\Http\Controllers;

use App\Models\Actores;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Models\Buscador;
use App\Models\Estatus;
use App\Models\Expedientes;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Node\Query\AndExpr;
use App\Models\cobranza;

class BuscadorController extends Controller
{



    public function index()
    {

        $estatuses = Estatus::orderBy('nombre', 'asc')->get();
        return View("admin.buscador.index", compact('estatuses'));
    }

    public function busqueda(Request $request)
    {

        $uin = $request->get('uin');

        $estatus = $request->get('estatus');

        $from_date = $request->get('from_date');

        $to_date = $request->get('to_date');


        $bv = $request->get('buscar');



        $act = Actores::where('nombre', $request->uin)
        ->orwhere('nombre', 'LIKE', '%' . $request->uin . '%')
        ->get()
        ->toArray();

        $act_id = array_column($act, 'id');

        if (!is_null($from_date) and !is_null($to_date)) {
            $b_fechas = true;
        } elseif (is_null($from_date) or is_null($to_date)) {
            $b_fechas = false;
        }



        $expedientes = Expedientes::whereIntegerInRaw('actor_id', $act_id)
        ->when($b_fechas, function ($query) use ($request) {
            $query->whereBetween('created_at', [$request->get('from_date'), $request->get('to_date')]);
        })
        ->when(!is_null($estatus), function ($query) use ($request) {
            $query->where('estatus_id', '=', $request->estatus);
        })
        ->get();


        //  $query = Locacion::where('nombre', 'LIKE', '%' . $uin . '%')->get();
        $Response = ['success' => 'logrado'];

        return view('admin.buscador.resultados', compact('expedientes'));


        // return response()->json($tipo_propiedad, 200);
    }
}
