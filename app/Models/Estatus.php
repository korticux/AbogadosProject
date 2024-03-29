<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Expedientes;

class Estatus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tramites()
    {
        return $this->hasMany(Expedientes::class, 'estatus_id');
    }
}
