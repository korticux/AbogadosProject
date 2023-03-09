<?php

namespace App\Exports;

use App\Models\Estados;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EstadosExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Estados::all();
    }

    public function headings(): array
    {
        return ["id","Nombre","created_at","updated_at"] ;
    }
}
