<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Regiones;
use App\Models\Actores;

class Expedientes extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function region()
    {

        return $this->belongsTo(Regiones::class);
    }

    public function actor()
    {
        return $this->belongsTo(Actores::class);
    }

    public function dependencia()
    {
        return $this->belongsTo(Dependencias::class);
    }

    public function tramite()
    {
        return $this->belongsTo(Tramites::class);
    }

    public function estatus()
    {
        return $this->belongsTo(Estatus::class);
    }

    public function peticion()
    {
        return $this->belongsTo(Peticiones::class);
    }
}
