<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\cobranza;

class PagosCobranzas extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cobranzas(){

        return $this->belongsTo(cobranza::class);
    }

}
