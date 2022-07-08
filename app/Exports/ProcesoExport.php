<?php

namespace App\Exports;

use App\Models\Proceso;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProcesoExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Proceso::all();
    }

    public function headings(): array
    {
        return ["id","Numero de Expediente", "Fecha de Ingreso", 'Numero de Oficio','Quien Recibio'];
    }
}
