<?php

namespace App\Exports;

use App\Models\Notificaciones;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NotificacionesExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Notificaciones::all();
    }

    public function headings(): array
    {
        return ["id", "nombre", "created_at", "updated_at"];
    }
}
