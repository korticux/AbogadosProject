<?php

namespace App\Exports;

use App\Models\Estatus;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EstatusExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Estatus::all();
    }

    public function headings(): array
    {
        return ["id","nombre","created_at","updated_at"];
    }
}
