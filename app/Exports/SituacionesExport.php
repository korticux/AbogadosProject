<?php

namespace App\Exports;

use App\Models\situaciones;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SituacionesExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return situaciones::all();
    }

    public function headings(): array
    {
        return ["id", "expediente", "situacion", "fecha", "comentario", "created_at", "updated_at"];
    }
}
