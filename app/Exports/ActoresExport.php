<?php

namespace App\Exports;

use App\Models\Actores;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ActoresExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Actores::all();
    }

    public function headings(): array
    {

        return ["id", "nocliente", "nombre", "curp", "rfc", "nacimiento", "correo", "telefono", "domicilio", "estado_id", "ciudad", "comentarios", "created_at", "updated_at"];
    }
}
