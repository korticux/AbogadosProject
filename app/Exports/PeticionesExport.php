<?php

namespace App\Exports;

use App\Models\Peticiones;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PeticionesExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Peticiones::all();
    }

    public function headings(): array
    {
        return ["id", "lugar", "created_at", "updated_at"];
    }
}
