<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Expedientes;

class Actores extends Model
{
    use HasFactory;

    protected $filled = [];

    public function expedientes(){
        return $this->hasMany(Expedientes::class, 'actor_id');
    }
}
