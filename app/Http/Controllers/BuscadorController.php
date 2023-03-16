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

class BuscadorController extends Controller
{



    public function index () {
        $buscador = Buscador::latest()->paginate(5000);
        $estatuses = Estatus::orderBy('nombre', 'asc')->get();
        return View("admin.buscador.index", compact("buscador", 'estatuses'));
    }

    public function busqueda(Request $request)
    {

        $uin = $request->get('uin');

        $estatus = $request->get('estatus');

        $from_date = $request->get('from_date');

        $to_date = $request->get('to_date');


        $bv = $request->get('buscar');


        if ($bv != null) {
            $act = Actores::where('nombre', 'LIKE', '%' . $request->uin . '%')->get()->toArray();
            $act_id = array_column($act, 'id');



                $expedientes = Expedientes::whereIn('actor_id', $act_id)
                ->when(!is_null($estatus), function ($query) use ($request) {
                    $query->where('estatus_id', '=', $request->estatus);
                })->whereBetween('created_at', [$from_date, $to_date])
                ->get();

        }


        //  $query = Locacion::where('nombre', 'LIKE', '%' . $uin . '%')->get();
        $Response = ['success' => 'logrado'];

        return view('admin.buscador.resultados', compact('expedientes'));


        // return response()->json($tipo_propiedad, 200);
    }




}
