<?php

namespace App\Exports;

use App\Models\Tramites;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TramitesExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Tramites::all();
    }

    public function headings(): array
    {
        return ["id","nombre", "created_at"];
    }
}
