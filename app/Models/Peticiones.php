<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Expedientes;

class Peticiones extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tramites()
    {
        return $this->hasMany(Expedientes::class, 'peticion_id');
    }
}
