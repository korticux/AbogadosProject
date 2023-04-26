@php
$total_cobranza = DB::table('cobranzas')->count();
$total_paises = DB::table('paises')->count();
$total_peticiones = DB::table('peticiones')->count();
$total_procesos = DB::table('procesos')->count();
$total_regiones = DB::table('regiones')->count();
$total_situaciones = DB::table('situaciones')->count();
$total_tramites = DB::table('tramites')->count();

$total_estados = DB::table('estados')->count();
$total_actores = DB::table('actores')->count();
$total_cuentas = DB::table('cuentas')->count();
$total_dependencias = DB::table('dependencias')->count();
$total_estatuses = DB::table('estatuses')->count();
$total_expedientes = DB::table('expedientes')->count();
$total_festivos = DB::table('festivos')->count();
$total_municipios = DB::table('municipios')->count();
$total_notificaciones = DB::table('notificaciones')->count();

// Actores por Sonora y Monterrey
use App\Models\Actores;
$total_actores_sonora = Actores::where('estado_id', 26)->count();
$total_actores_monterrey = Actores::where('estado_id', 19)->count();

// Expedientes por estatus baja y peticion a favor
use App\Models\Expedientes;
$total_estatus_baja = Expedientes::where('estatus_id', 19)->count();
$total_estatus_favor = Expedientes::where('estatus_id', 23)->count();


// Expedientes por vencer amparo
$fecha_inicio = date('Y-m-d');
$fecha_vencimiento = date('Y-m-d', strtotime('+9 day', strtotime($fecha_inicio)));
$fecha_limite = date('Y-m-d', strtotime('+14 day', strtotime($fecha_inicio)));

$total_estatus_amparo_favor = Expedientes::whereBetween('fecha14', [$fecha_vencimiento, $fecha_limite])->get()->count();

use App\Models\Cobranza;
// Actores donde la cobranza esta completa

$actores_cobranza_completa = Cobranza::where('monto_percibido', '!=', 'total')->get('actor_id')->count();


// Actores donde la cobranza esta incompleta
// $actores_cobranza_incompleta = Cobranza::where('monto_percibido', '!=', 'total')->get()->count();

$actores_cobranza_incompleta = Cobranza::where('monto_percibido', '=', 'total')->get('actor_id')->count();



@endphp
@extends('admin.admin_master')

@section('admin')
    <div class="row">

        <!-- Left side columns -->
        <div class="col-md-12">
            <div class="row">
                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Clientes De Sonora</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-brightness-high-fill"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $total_actores_sonora }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Clientes De Monterrey</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-battery-charging"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $total_actores_monterrey }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Clientes De Baja</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-caret-down"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $total_estatus_baja }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Clientes Sentencia A Favor</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-check"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $total_estatus_favor }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Clientes  Amparados Por Vencer</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-caret-right"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $total_estatus_amparo_favor }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>



                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Clientes Con Cobranza Incompleta</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cash-stack"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $actores_cobranza_incompleta }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Clientes Con Cobranza Completada</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cash-coin"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $actores_cobranza_completa }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


{{--
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Cobranzas Registradas</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-coin"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $total_cobranza }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Estados Registrados</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-map"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $total_estados }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->


                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Paises Registrados</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-geo-alt"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $total_paises }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Peticiones Registradas</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-inbox"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $total_peticiones }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->


                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Procesos Registrados</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-hourglass"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $total_procesos }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Regiones Registradas</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-compass"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $total_regiones }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Situaciones Registradas</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-brush"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $total_situaciones }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Trámitres Registrados</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-clipboard"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $total_tramites }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Actores registrados</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon  rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $total_actores }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Sales Card -->
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Cuentas registradas</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon  rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-bank"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $total_cuentas }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Sales Card -->
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Dependencias registradas</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon  rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-building"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $total_dependencias }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Sales Card -->
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Estatus registrados</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon  rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-clipboard-data"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $total_estatuses }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Sales Card -->
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Expedientes registrados</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon  rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-briefcase"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $total_expedientes }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Sales Card -->
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Festivos registrados</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon  rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-pin-angle"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $total_festivos }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Sales Card -->
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Municipios registrados</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon  rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-pin-map"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $total_municipios }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Sales Card -->
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-3">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Notificaciones registradas</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon  rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-bell"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $total_notificaciones }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Sales Card --> --}}


            </div>
        </div>
    @endsection
