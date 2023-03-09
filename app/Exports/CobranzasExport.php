<?php

namespace App\Exports;

use App\Models\cobranza;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CobranzasExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return cobranza::all();
    }

    public function headings(): array
    {
        return ["id", "cobranza", " tipo", "cuenta_id", "referencia", "fecha", "monto", "created_at", "updated_at"];
    }
}
