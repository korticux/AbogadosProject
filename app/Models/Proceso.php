<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Expedientes;
use App\Models\Regiones;
class Proceso extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function region(){

        return $this->belongsTo(Regiones::class);
    }

    public function expedientes(){

        return $this->belongsTo(Expedientes::class);
    }

}

