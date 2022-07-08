<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tramites extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function expedientes()
    {
        return $this->hasMany(Expedientes::class, 'tramite_id');
    }
}
