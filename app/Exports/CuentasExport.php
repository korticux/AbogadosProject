<?php

namespace App\Exports;

use App\Models\Cuentas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CuentasExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Cuentas::all();
    }

    public function headings(): array
    {
        return ["id", "banco", "cuenta", "created_at", "updated_at"];
    }
}
