<?php

namespace App\Exports;

use App\Models\Festivos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FestivosExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Festivos::all();
    }

    public function headings(): array
    {
        return ["id","fecha","nombre","created_at","updated_at"];
    }
}
