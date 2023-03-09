<?php

namespace App\Imports;

use App\Models\Actores;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;

class ActoresImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Actores([
            'nocliente' => $row["nocliente"],
            'nombre' => $row["nombre"],
            'curp' => $row["curp"],
            'rfc' => $row["rfc"],
            'nacimiento' => $row["nacimiento"],
            'correo' => $row["correo"],
            'telefono' => $row["telefono"],
            'domicilio' => $row["domicilio"],
            'ciudad' => $row["ciudad"],
            'comentarios' => $row["comentarios"],
            'created_at' => $row["created_at"],

        ]);
    }
}
