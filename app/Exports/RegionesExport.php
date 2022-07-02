<?php

namespace App\Exports;

use App\Models\Regiones;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RegionesExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Regiones::all();
    }

    public function headings(): array
    {
        return ["id", "numero", "nombre", "created_at", "updated_at"];
    }
}
