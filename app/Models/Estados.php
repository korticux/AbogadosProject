<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function actores()
    {
        return $this->hasMany(Actores::class, 'estado_id');
    }

    public function municipios()
    {
        return $this->hasMany(Municipios::class, 'estado_id');
    }
}
