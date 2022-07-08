<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cobranza extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cuenta()
    {
        return $this->belongsTo(Cuentas::class);
    }
}
