<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cuentas;

class cobranza extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cuenta()
    {
        return $this->belongsTo(Cuentas::class);
    }

    public function ArchivosCobranza()
    {
        return $this->hasMany(ArchivosCobranza::class, 'cobranza_id');
    }
}
