<?php

namespace App\Http\Controllers;

use App\Exports\ActoresExport;
use App\Models\Actores;
use App\Models\ArchivosActores;
use App\Models\Estados;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
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
        return View('admin.actores.create', compact('estados'));
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
        $archivos_actores = ArchivosActores::where('actor_id', $actor->id)->get();

        return View('admin.actores.update', compact('actor', 'estados', 'archivos_actores','id'));
    }

    public function update($id, Request $request)
    {

        $validatedData = $request->validate([
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
            'updated_at' => \Carbon\Carbon::now()
        ]);

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

    public function downloadPdf()
    {
        $actores = Actores::all();

        $pdf = PDF::loadView("admin.actores.actoresPdf", compact("actores"));

        return $pdf->download("actores.pdf");
    }
}
