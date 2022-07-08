<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Expedientes;

class Proceso extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function region(){

        return $this->belongsTo(Expedientes::class);
    }

}
