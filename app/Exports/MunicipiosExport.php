<?php

namespace App\Exports;

use App\Models\Municipios;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MunicipiosExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Municipios::all();
    }

    public function headings(): array
    {
        return ["id", "nombre", "estado", "created_at", "updated_at"];
    }
}
