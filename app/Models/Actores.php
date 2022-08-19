<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Expedientes;
use App\Models\cobranza;

class Actores extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function expedientes()
    {
        return $this->hasMany(Expedientes::class, 'actor_id');
    }

    public function estado()
    {
        return $this->belongsTo(Estados::class);
    }

    public function ArchivosActores()
    {
        return $this->hasMany(ArchivosActores::class, 'actor_id');
    }

    public function dependencia()
    {
        return $this->belongsTo(Dependencias::class);
    }

    public function cobranzas()
    {
        return $this->hasMany(cobranza::class, 'cobranza_id');
    }
}
