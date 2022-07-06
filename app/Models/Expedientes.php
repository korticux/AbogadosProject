<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Regiones;
use App\Models\Actores;

class Expedientes extends Model
{
    use HasFactory;

    protected $filled = [];

    public function region(){

        return $this->belongsTo(Regiones::class);
    }

    public function actor(){

        return $this->belongsTo(Actores::class);
    }

}

