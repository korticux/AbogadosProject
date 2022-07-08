<?php

namespace App\Http\Controllers;

use App\Models\Estados;
use App\Models\Actores;
use App\Models\Cuentas;
use App\Models\Dependencias;
use App\Models\Estatus;
use App\Models\Expedientes;
use App\Models\Festivos;
use App\Models\Municipios;
use App\Models\Notificaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function EstadosTotal()
    {
        $estados_total = Estados::latest()->get();
        $total = $estados_total->count();
        return View('admin.index', compact('total'));
    }

    public function ActoresTotal()
    {
        $actores_total = Actores::latest()->get();
        $total = $actores_total->count();
        return View('admin.index', compact('total'));
    }

    public function CuentasTotal()
    {
        $cuentas_total = Cuentas::latest()->get();
        $total = $cuentas_total->count();
        return View('admin.index', compact('total'));
    }

    public function DependenciasTotal()
    {
        $dependencias_total = Dependencias::latest()->get();
        $total = $dependencias_total->count();
        return View('admin.index', compact('total'));
    }

    public function EstatusesTotal()
    {
        $estatuses_total = Estatus::latest()->get();
        $total = $estatuses_total->count();
        return View('admin.index', compact('total'));
    }

    public function ExpedientesTotal()
    {
        $expedientes_total = Expedientes::latest()->get();
        $total = $expedientes_total->count();
        return View('admin.index', compact('total'));
    }

    public function FestivosTotal()
    {
        $festivos_total = Festivos::latest()->get();
        $total = $festivos_total->count();
        return View('admin.index', compact('total'));
    }

    public function MunicipiosTotal()
    {
        $municipios_total = Municipios::latest()->get();
        $total = $municipios_total->count();
        return View('admin.index', compact('total'));
    }

    public function NotificacionesTotal()
    {
        $notificaciones_total = Notificaciones::latest()->get();
        $total = $notificaciones_total->count();
        return View('admin.index', compact('total'));
    }
}
