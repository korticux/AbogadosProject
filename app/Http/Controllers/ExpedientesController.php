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
        $expedientes = Expedientes::latest()->paginate(5);
        return View("admin.expedientes.index", compact("expedientes"));
    }

    public function post()
    {

        $regiones = Regiones::latest()->get();
        $dependencias = Dependencias::latest()->get();
        $actores = Actores::latest()->get();
        $estatus = Estatus::latest()->get();
        $tramites = Tramites::latest()->get();
        $peticiones = Peticiones::latest()->get();
        return View('admin.expedientes.create', compact("tramites", "estatus", "actores", "dependencias", "regiones", "peticiones"));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'numero' => 'required',
            'ano' => 'required',
            'region_id' => 'required',
            'sala' => 'required',
            'ponencia' => 'required',
            'peticion_id' => 'required',
            'fecha' => 'required',
            'actor_id' => 'required',
            'dependencia_id' => 'required',
            'estatus_id' => 'required',
            'tramite_id' => 'required',
            'comentarios' => 'required',
            'honorario' => 'required',
            'pagoinicial' => 'required',
            'fecha1' => 'required',
            'fecha2' => 'required',
            'fecha3' => 'required',
            'fecha4' => 'required',
            'fecha5' => 'required',
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



        $new_expediente = Expedientes::create($data);

        if ($request->has('nombre_archivos')) {
            foreach ($request->file('nombre_archivos') as $documento) {
                $documento_nname = $data['nombre'] . '-documento-' . time() . rand(1, 1000) . '.' . $documento->extension();
                $documento->move(public_path('expedientes_documentos'), $documento_nname);
                ArchivosExpedientes::create([
                    'expediente_id' => $new_expediente->id,
                    'nombre_archivos' => $documento_nname,
                    'nombre' => $documento_nname,
                    'created_at' => Carbon::now()
                ]);
            }
        }


        Expedientes::insert([
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
            'created_at' => Carbon::now(),
        ]);

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

    public function edit($id)
    {
        $expediente = Expedientes::findOrFail($id);
        $regiones = Regiones::latest()->get();
        $dependencias = Dependencias::latest()->get();
        $actores = Actores::latest()->get();
        $estatus = Estatus::latest()->get();
        $tramites = Tramites::latest()->get();
        $peticiones = Peticiones::latest()->get();
        $archivos_expedientes = ArchivosExpedientes::where('expediente_id', $expediente->id)->get();
        return View('admin.expedientes.update', compact("tramites", "estatus", "actores", "dependencias", "regiones", "peticiones", "expediente", "archivos_expedientes"));
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'numero' => 'required',
            'ano' => 'required',
            'region_id' => 'required',
            'sala' => 'required',
            'ponencia' => 'required',
            'peticion_id' => 'required',
            'fecha' => 'required',
            'actor_id' => 'required',
            'dependencia_id' => 'required',
            'estatus_id' => 'required',
            'tramite_id' => 'required',
            'comentarios' => 'required',
            'honorario' => 'required',
            'pagoinicial' => 'required',
            'fecha1' => 'required',
            'fecha2' => 'required',
            'fecha3' => 'required',
            'fecha4' => 'required',
            'fecha5' => 'required',
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
            'updated_at' => \Carbon\Carbon::now(),
        ]);




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
}
