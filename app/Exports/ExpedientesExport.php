<?php

namespace App\Exports;

use App\Models\Expedientes;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExpedientesExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Expedientes::all();
    }

    public function headings(): array
    {
        return [
            "id", "numero", "ano", "region_id", "peticion_id", "estatus_id", "tramite_id", "sala", "ponencia", "fecha", "actor_id", "dependencia_id",
            "comentarios", "honorario", "pagoinicial", "fecha1", "fecha2", "fecha3", "fecha4", "fecha5", "fecha6","created_at","updated_at"
        ];
    }
}
