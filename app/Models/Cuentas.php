<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuentas extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cobranzas()
    {
        return $this->hasMany(cobranza::class, 'cuenta_id');
    }
}
