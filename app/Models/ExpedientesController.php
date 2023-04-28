<?php

namespace App\Http\Controllers;

use App\Exports\ExpedientesExport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Expedientes;
use App\Models\Regiones;
use App\Models\Actores;
use App\Models\ArchivosExpedientes;
use App\Models\Dependencias;
use App\Models\Estatus;
use App\Models\Tramites;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Peticiones;
use Illuminate\Support\Facades\Storage;
use PDF;

class ExpedientesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:estatus-list|estatus-created|estatus-edit|estatus-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:estatus-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:estatus-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:estatus-delete', ['only' => ['destroy']]);
    }

    public function createPDF()
    {
        $datos = Expedientes::all();
        $pdf = PDF::loadView('admin.expedientes.createPDF', compact('datos'));
        return $pdf->download('Expedientes_PDF.pdf');
    }

    public function index()
    {
        $expedientes = Expedientes::latest()->paginate(5000);
        return View("admin.expedientes.index", compact("expedientes"));
    }

    public function post()
    {

        $regiones = Regiones::latest()->get();
        $dependencias = Dependencias::latest()->get();
        $actores = Actores::orderBy('nombre', 'asc')->get();
        $estatus = Estatus::latest()->get();
        $tramites = Tramites::latest()->get();
        $peticiones = Peticiones::latest()->get();
        return View('admin.expedientes.create', compact("tramites", "estatus", "actores", "dependencias", "regiones", "peticiones"));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'numero' => '',
            'ano' => '',
            'region_id' => '',
            'sala' => '',
            'ponencia' => '',
            'peticion_id' => '',
            'fecha' => '',
            'actor_id' => '',
            'dependencia_id' => '',
            'estatus_id' => '',
            'tramite_id' => '',
            'comentarios' => '',
            'honorario' => '',
            'pagoinicial' => '',
            'fecha1' => '',
            'fecha2' => '',
            'fecha3' => '',
            'fecha4' => '',
            'fecha5' => '',
        ],

        [
            'numero.required' => 'El numero del expediente es requerido',
            'ano.required' => 'El año del expediente es requerido',
            'region_id.required' => 'La region del expediente es requerida',
            'sala.required' => 'La sala del expediente es requerida',
            'ponencia.required' => 'La ponencia del expediente es requerida',
            'peticion_id.required' => 'La peticion del expediente es requerida',
            'fecha.required' => 'La fecha del expediente es requerida',
            'actor_id.required' => 'El actor del expediente es requerido',
            'dependencia_id.required' => 'La fecha del expediente es requerida',
            'estatus_id.required' => 'El estatus del expediente es requerido',
            'tramite_id.required' => 'El tramite del expediente es requerido',
            'comentarios.required' => 'El comentario del expediente es requerida',
            'honorario.required' => 'El honorario del expediente es requerido',
            'pagoinicial.required' => 'El pago inicial del expediente es requerido',
            'fecha1.required' => 'La fecha del expediente es requerida',
            'fecha2.required' => 'La fecha del expediente es requerida',
            'fecha3.required' => 'La fecha del expediente es requerida',
            'fecha4.required' => 'La fecha del expediente es requerida',
            'fecha5.required' => 'La fecha del expediente es requerida',
        ]);

        $new_expediente = Expedientes::create($data);

        $new_expediente->update([
            'numero_exp' => $request->numero . " / " . $request->ano . " - " .$request->region_id . " - " . $request->sala . " - " . $request->ponencia,
        ]);

        if ($request->has('nombre_archivos')) {
            foreach ($request->file('nombre_archivos') as $documento) {
                $documento_nname = $data['numero'] . '-documento-' . time() . rand(1, 1000) . '.' . $documento->extension();
                $documento->move(public_path('expedientes_documentos'), $documento_nname);
                ArchivosExpedientes::create([
                    'expediente_id' => $new_expediente->id,
                    'nombre_archivos' => $documento_nname,
                    'nombre' => $documento_nname,
                    'created_at' => Carbon::now()
                ]);
            }
        }

        $notification  = array(
            'message' => "Expediente Agregado Correctamente",
            'alert-type' => "success",
        );


        return redirect()->route('expedientes.index')->with($notification);

    }

    public function delete($id)
    {

        Expedientes::findOrFail($id)->delete();

        $notification = array(
            'message' => "Expediente Eliminado Correctamente",
            'alert-type' => "error",
        );

        return redirect()->route('expedientes.index')->with($notification);
    }

    public function deleteExpedientes($id, $Expedienteid)
    {
        ArchivosExpedientes::where("id",$id)->where("expediente_id", $Expedienteid)->delete();

        $notification = array(
            'message' => "Archivo Expediente Eliminado Correctamente",
            'alert-type' => "error",
        );

        return redirect()->route('expedientes.index')->with($notification);
        }

    public function edit($id)
    {
        $expediente = Expedientes::findOrFail($id);
        $regiones = Regiones::latest()->get();
        $dependencias = Dependencias::latest()->get();
        $actores = Actores::orderBy('nombre', 'asc')->get();
        $estatus = Estatus::latest()->get();
        $tramites = Tramites::latest()->get();
        $peticiones = Peticiones::latest()->get();
        $archivos_expedientes = ArchivosExpedientes::where('expediente_id', $expediente->id)->get();
        return View('admin.expedientes.update', compact("tramites", "estatus", "actores", "dependencias", "regiones", "peticiones", "expediente", "archivos_expedientes"));
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'numero' => '',
            'ano' => '',
            'region_id' => '',
            'sala' => '',
            'ponencia' => '',
            'peticion_id' => '',
            'fecha' => '',
            'actor_id' => '',
            'dependencia_id' => '',
            'estatus_id' => '',
            'tramite_id' => '',
            'comentarios' => '',
            'honorario' => '',
            'pagoinicial' => '',
            'fecha1' => '',
            'fecha2' => '',
            'fecha3' => '',
            'fecha4' => '',
            'fecha5' => '',

        ], [
            'numero.required' => 'El numero del expediente es requerido',
            'ano.required' => 'El año del expediente es requerido',
            'region_id.required' => 'La region del expediente es requerida',
            'sala.required' => 'La sala del expediente es requerida',
            'ponencia.required' => 'La ponencia del expediente es requerida',
            'peticion_id.required' => 'La peticion del expediente es requerida',
            'fecha.required' => 'La fecha del expediente es requerida',
            'actor_id.required' => 'El actor del expediente es requerido',
            'dependencia_id.required' => 'La fecha del expediente es requerida',
            'estatus_id.required' => 'El estatus del expediente es requerido',
            'tramite_id.required' => 'El tramite del expediente es requerido',
            'comentarios.required' => 'El comentario del expediente es requerida',
            'honorario.required' => 'El honorario del expediente es requerido',
            'pagoinicial.required' => 'El pago inicial del expediente es requerido',
            'fecha1.required' => 'La fecha del expediente es requerida',
            'fecha2.required' => 'La fecha del expediente es requerida',
            'fecha3.required' => 'La fecha del expediente es requerida',
            'fecha4.required' => 'La fecha del expediente es requerida',
            'fecha5.required' => 'La fecha del expediente es requerida',
        ]);



        Expedientes::findOrFail($id)->update([
            'numero' => $request->numero,
            'ano' => $request->ano,
            'region_id' => $request->region_id,
            'sala' => $request->sala,
            'ponencia' => $request->ponencia,
            'peticion_id' => $request->peticion_id,
            'fecha' => $request->fecha,
            'actor_id' => $request->actor_id,
            'dependencia_id' => $request->dependencia_id,
            'estatus_id' => $request->estatus_id,
            'tramite_id' => $request->tramite_id,
            'comentarios' => $request->comentarios,
            'honorario' => $request->honorario,
            'pagoinicial' => $request->pagoinicial,
            'fecha1' => $request->fecha1,
            'fecha2' => $request->fecha2,
            'fecha3' => $request->fecha3,
            'fecha4' => $request->fecha4,
            'fecha5' => $request->fecha5,
            'fecha6' => $request->fecha6,
            'fecha7' => $request->fecha7,
            'fecha8' => $request->fecha8,
            'fecha9' => $request->fecha9,
            'fecha10' => $request->fecha10,
            'fecha11' => $request->fecha11,
            'fecha12' => $request->fecha12,
            'fecha13' => $request->fecha13,
            'fecha14' => $request->fecha14,
            'fecha15' => $request->fecha15,
            'comentario1' => $request->comentario1,
            'comentario2' => $request->comentario2,
            'comentario3' => $request->comentario3,
            'comentario4' => $request->comentario4,
            'comentario5' => $request->comentario5,
            'comentario6' => $request->comentario6,
            'comentario7' => $request->comentario7,
            'comentario8' => $request->comentario8,
            'comentario9' => $request->comentario9,
            'comentario10' => $request->comentario10,
            'comentario11' => $request->comentario11,
            'comentario12' => $request->comentario12,
            'comentario13' => $request->comentario13,
            'comentario14' => $request->comentario14,
            'comentario15' => $request->comentario15,
            'tipo_actor' => $request->tipo_actor,
            'numero_exp' => $request->numero . " / " . $request->ano . " - " .$request->region_id . " - " . $request->sala . " - " . $request->ponencia,
            'tipo_expediente' => $request->tipo_expediente,
            'updated_at' => \Carbon\Carbon::now(),

        ]);

        $data = $request;

        if ($request->has('nombre_archivos')) {
            foreach ($request->file('nombre_archivos') as $documento) {
                $documento_nname = $data['numero'] . '-documento-' . time() . rand(1, 1000) . '.' . $documento->extension();
                $documento->move(public_path('expedientes_documentos'), $documento_nname);
                ArchivosExpedientes::create([
                    'expediente_id' => $id,
                    'nombre_archivos' => $documento_nname,
                    'nombre' => $documento_nname,
                    'created_at' => Carbon::now()
                ]);
            }
        }

        $notification = array(
            'message' => "Expediente Actualizado Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('expedientes.index')->with($notification);
    }

    public function export()
    {
        return Excel::download(new ExpedientesExport, "expedientes.xlsx");
    }

    public function download($id)
    {
        $archivo =  ArchivosExpedientes::where('id','=',$id)->get();
        
        return  response()->download(public_path("expedientes_documentos/" . $archivo[0]->nombre_archivos), null, [], null);
    }
}
