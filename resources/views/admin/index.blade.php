@php
    $total_cobranza = DB::table('cobranzas')->count();
    $total_paises = DB::table('paises')->count();
    $total_peticiones = DB::table('peticiones')->count();
    $total_procesos = DB::table('procesos')->count();
    $total_regiones = DB::table('regiones')->count();
    $total_situaciones = DB::table('situaciones')->count();
    $total_tramites = DB::table('tramites')->count();
@endphp

@extends('admin.admin_master')

@section('admin')
    <div class="row">

        <!-- Left side columns -->
        <div class="col-md-12">
            <div class="row">

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
                                    <h6>{{$total_cobranza}}</h6>
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
                                    <h6>{{$total_paises}}</h6>
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
                                    <h6>{{$total_peticiones}}</h6>
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
                                    <h6>{{$total_procesos}}</h6>
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
                                    <h6>{{$total_regiones}}</h6>
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
                                    <h6>{{$total_situaciones}}</h6>
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
                                    <h6>{{$total_tramites}}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

            </div>
        </div>
    </div>
@endsection
