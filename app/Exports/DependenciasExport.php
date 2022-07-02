<?php

namespace App\Exports;

use App\Models\Dependencias;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DependenciasExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Dependencias::all();
    }

    public function headings(): array
    {
        return ["id", "nombre", "created_at", "updated_at"];
    }
}
