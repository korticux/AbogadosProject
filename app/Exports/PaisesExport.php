<?php

namespace App\Exports;

use App\Models\Paises;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PaisesExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Paises::all();
    }

    public function headings(): array
    {
        return ["id", "nombre", "created_at", "updated_at"];
    }
}
