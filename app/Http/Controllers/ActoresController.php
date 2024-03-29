<?php

namespace App\Http\Controllers;

use App\Exports\ActoresExport;
use App\Models\Actores;
use App\Models\Dependencias;
use App\Models\ArchivosActores;
use App\Models\Estados;
use App\Models\Expedientes;
use App\Models\Tramites;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class ActoresController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:actores-list|actores-created|actores-edit|actores-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:actores-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:actores-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:actores-delete', ['only' => ['destroy']]);
    }
    public function createPDF()
    {
        $datos = Actores::all();
        $pdf = PDF::loadView('admin.actores.createPDF', compact('datos'));
        return $pdf->download('Actores_PDF.pdf');
    }

    public function index()
    {
        $actores = Actores::latest()->paginate(5000);
        return View("admin.actores.index", compact("actores"));
    }

    public function post()
    {
        $estados = Estados::latest()->get();
        $dependencias = Dependencias::latest()->get();
        $tramites = Tramites::latest()->get();
        return View('admin.actores.create', compact('estados', 'tramites', 'dependencias'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => '',
            'curp' => '',
            'correo' => '',
            'telefono' => '',
            'nocliente' => '',
            'rfc' => '',
            'domicilio' => '',
            'ciudad' => '',
            'comentarios' => '',
            'nacimiento' => '',
            'estado_id' => '',
            'honorario' => '',
            'fecha1' => '',
            'abonado' => '',
            'dependencia_id' => '',

        ]);

        $new_actor = Actores::create($data);

        if ($request->has('nombre_archivo')) {
            foreach ($request->file('nombre_archivo') as $documento) {
                $documento_nname = $data['nombre'] . '-documento-' . time() . rand(1, 1000) . '.' . $documento->extension();
                $documento->move(public_path('actores_documentos'), $documento_nname);
                ArchivosActores::create([
                    'actor_id' => $new_actor->id,
                    'nombre_archivo' => $documento_nname,
                    'created_at' => Carbon::now()
                ]);
            }
        }

        Expedientes::create([
            'numero' => $new_actor->nombre . '-' . 'expediente',
            'actor_id' => $new_actor->id,
            'created_at' => Carbon::now()
        ]);

        $notification  = array(
            'message' => "Actor Agregado Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('actores.index')->with($notification);
    }

    public function delete($id)
    {
        $estado = Actores::findOrFail($id);

        Actores::findOrFail($id)->delete();

        $notification = array(
            'message' => "Actor Eliminado Correctamente",
            'alert-type' => "error",
        );

        return redirect()->route('actores.index')->with($notification);
    }

    public function deleteActores($id, $ActoresId)
    {
        ArchivosActores::where("id", $id)->where("actor_id", $ActoresId)->delete();

        $notification = array(
            'message' => "Archivo Actor Eliminado Correctamente",
            'alert-type' => "error",
        );

        return redirect()->route('actores.index')->with($notification);
    }

    public function edit($id)
    {
        $actor = Actores::findOrFail($id);
        $estados = Estados::latest()->get();
        $dependencias = Dependencias::latest()->get();
        $tramites = Tramites::latest()->get();
        $archivos_actores = ArchivosActores::where('actor_id', $actor->id)->get();

        return View('admin.actores.update', compact('actor', 'tramites' , 'estados', 'dependencias', 'archivos_actores','id'));
    }

    public function update($id, Request $request)
    {

        $request->validate([
            'nombre' => '',
            'curp' => '',
            'correo' => '',
            'telefono' => '',
            'nocliente' => '',
            'domicilio' => '',
            'ciudad' => '',
            'comentarios' => '',
            'nacimiento' => '',
            'estado_id' => '',
            'honorario' => 'required|numeric',
            'fecha1' => '',
            'abonado' => '',
            'dependencia_id' => '',
            'tipodemanda' => '',
        ],
        [
            'honorario.numeric' => 'Digitar sólo números',
        ]);

        Actores::findOrFail($id)->update([
            'nombre' => $request->nombre,
            'curp' => $request->curp,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'nocliente' => $request->nocliente,
            'nacimiento' => $request->nacimiento,
            'domicilio' => $request->domicilio,
            'rfc' => $request->rfc,
            'estado_id' => $request->estado_id,
            'ciudad' => $request->ciudad,
            'comentarios' => $request->comentarios,
            'honorario' => $request->honorario,
            'fecha1' => $request->fecha1,
            'abonado' => $request->abonado,
            'dependencia_id' => $request->dependencia_id,
            'tipodemanda' => $request->tipodemanda,
            'updated_at' => \Carbon\Carbon::now()
        ]);

        $data = $request;

        if ($request->has('nombre_archivo')) {
            foreach ($request->file('nombre_archivo') as $documento) {
                $documento_nname = $data['nombre'] . '-documento-' . time() . rand(1, 1000) . '.' . $documento->extension();
                $documento->move(public_path('actores_documentos'), $documento_nname);
                ArchivosActores::create([
                    'actor_id' => $id,
                    'nombre_archivo' => $documento_nname,
                    'created_at' => Carbon::now()
                ]);
            }
        }

        $notification  = array(
            'message' => "Actor Actualizado Correctamente",
            'alert-type' => "success",
        );

        return redirect()->route('actores.index')->with($notification);
    }

    public function export()
    {
        return Excel::download(new ActoresExport, "actores.xlsx");
    }

    public function download($id)
    {
        $archivo =  ArchivosActores::where('id','=',$id)->get();



        return  response()->download(public_path("actores_documentos/" . $archivo[0]->nombre_archivo), null, [], null);
    }

    public function downloadPdf()
    {
        $actores = Actores::all();

        $pdf = PDF::loadView("admin.actores.actoresPdf", compact("actores"));

        return $pdf->download("actores.pdf");
    }
}
