@extends('admin.admin_master')


@section('admin')
    <div class="card-body">
        <h5 class="mb-0">Actualización del Expediente <b>No. ({{ $expediente->numero }})
                {{ $expediente->actor->nombre ?? 'Ninguno'}}</b></h5>
        <hr>

        <!-- TABS -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                    role="tab" aria-controls="home" aria-selected="true">Expediente</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                    role="tab" aria-controls="profile" aria-selected="false">Archivos del Expediente</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="proceso-tab" data-bs-toggle="tab" data-bs-target="#proceso" type="button"
                    role="tab" aria-controls="proceso" aria-selected="false" onclick="window.location='{{ url("proceso/index") }}'">Proceso Juridico</button>
            </li>
        </ul>

        <div class="tab-content pt-2" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <br>

                <!-- Floating Labels Form -->
                <form class="row g-3" method="POST" action="{{ route('expedientes.update', $expediente->id) }}">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" value="{{ $expediente->numero }}" name="numero" class="form-control"
                                    id="floatingName" placeholder="Ingresar numero">
                                @error('numero')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                                <label for="numero">Numero del expediente</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" value="{{ $expediente->ano }}" name="ano" class="form-control"
                                    id="floatingName" placeholder="Ingresar ano">
                                @error('ano')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                                <label for="nombre">Año</label>
                            </div>
                        </div>
                    </div>


                    <div class="row mb-3">

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" value="{{ $expediente->sala }}" name="sala" class="form-control"
                                    id="floatingName" placeholder="Ingresar sala">
                                @error('sala')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                                <label for="nombre">Sala</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" value="{{ $expediente->ponencia }}" name="ponencia"
                                    class="form-control" id="floatingName" placeholder="Ingresar ponencia">
                                @error('ponencia')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                                <label for="nombre">Ponencia</label>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <br> <br>


                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Región actual: <b>
                                {{ $expediente->region->nombre ?? 'Ninguno' }} </b></label>
                        <div class="form-floathing col-sm-5">
                            <select name="region_id" class="form-select" aria-label="Default select example">
                                <option>{{$expediente->region->id ?? 'Ninguno'}}</option>
                                @foreach ($regiones as $region)
                                    <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 ">Fecha Inicial del Expediente:</label>
                        <div class="form-floating col-sm-5">
                            <input type="date" value="{{ $expediente->fecha }}" name="fecha" class="form-control"
                                id="floatingName" placeholder="Ingresar fecha_de_ingreso">
                            @error('fecha')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Lugar de Petición: <b>
                                {{ $expediente->peticion->lugar ?? 'Ninguno' }}</b></label>
                        <div class="form-floathing col-sm-5">
                            <select name="peticion_id" class="form-select" aria-label="Default select example">
                                <option>{{$expediente->peticion->id ?? 'Ninguno'}}</option>
                                @foreach ($peticiones as $peticion)
                                    <option value="{{ $peticion->id }}">{{ $peticion->lugar }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Actor: <b>
                                {{ $expediente->actor->nombre ?? 'Ninguno'}}</b></label>
                        <div class="form-floathing col-sm-5">
                            <select name="actor_id" class="form-select" aria-label="Default select example">
                                <option>{{$expediente->actor->id ?? 'Ninguno'}}</option>
                                @foreach ($actores as $actor)
                                    <option value="{{ $actor->id }}">{{ $actor->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Dependencia:<b>
                            {{ $expediente->Dependencia->nombre ?? 'Ninguno'}}</b>
                        </label>
                        <div class="form-floathing col-sm-5">
                            <select name="dependencia_id" class="form-select" aria-label="Default select example">
                                <option>{{$expediente->Dependencia->id ?? 'Ninguno'}}</option>
                                @foreach ($dependencias as $dependencia)
                                    <option value="{{ $dependencia->id }}">{{ $dependencia->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Tramite: <b>
                                {{ $expediente->tramite->nombre ?? 'Ninguno'}}</b></label>
                        <div class="form-floathing col-sm-5">
                            <select name="tramite_id" class="form-select" aria-label="Default select example">
                                <option>{{$expediente->tramite->id ?? 'Ninguno'}}</option>
                                @foreach ($tramites as $tramite)
                                    <option value="{{ $tramite->id }}">{{ $tramite->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Estatus: <b>
                                {{ $expediente->estatus->nombre  ?? 'Ninguno'}}</b></label>
                        <div class="form-floathing col-sm-5">
                            <select name="estatus_id" class="form-select" aria-label="Default select example">
                               <option>{{$expediente->estatus->id ?? 'Ninguno'}}</option>
                                @foreach ($estatus as $estatus)
                                    <option value="{{ $estatus->id }}">{{ $estatus->nombre }}</option>
                                @endforeach

                            </select>
                        </div>
                        <br> <br>
                    </div>



                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" value="{{ $expediente->honorario }}" name="honorario"
                                    class="form-control" id="floatingName" placeholder="Ingresar honorario">
                                @error('honorario')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                                <label for="nombre">Honorario</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" value="{{ $expediente->pagoinicial }}" name="pagoinicial"
                                    class="form-control" id="floatingName" placeholder="Ingresar pago inicial">
                                @error('pagoinicial')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                                <label for="nombre">Pago Inicial</label>
                            </div>
                        </div>
                    </div>
                    <hr>


                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Comentarios del Expediente:</label>
                        <div class="col-md-9">
                            <textarea class="form-control" value="{{ $expediente->comentarios }}" name="comentarios" rows="10"> {{ $expediente->comentarios }} </textarea>
                            @error('Comentarios')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <hr>


                    <h5 class="row-sm-3 col-form-label" style="width:100%">Estatus<br>El sistema calcula los resultados en
                        base a los días actuales y festivos. <br> <br></h5>




                    <div class="row">
                        <div class="col-6">
                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>Ingreso de Petición
                                    ISSSTE</small></label>
                            <input type="date" value="{{ $expediente->fecha1 }}" name="fecha1" class="form-control"
                                id="floatingName" placeholder="Ingresar fecha1">
                            @error('fecha1')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="col-6">
                            @php
                                $fechav = date('m/d/Y', strtotime($expediente->fecha1 . '+ 30 days'));

                                $fechao = date('Y/m/d', strtotime($expediente->fecha1));
                                $fechaot = date('Y/m/d', strtotime($expediente->fecha1 . '+ 30 days'));
                            @endphp
                            <br>

                            @php
                                use App\Models\Festivos;
                                $festivos = Festivos::orderBy('fecha')->where([
                                    ['fecha', '>' , "$fechao"],
                                    ['fecha', '<' , "$fechaot"],
                                    ])->get();
                                $fcount1 = count($festivos);
                                $fechaven = date('d/m/Y', strtotime($expediente->fecha1 . '+ 30 days' . ' + ' .$fcount1. ' days' ));


                            @endphp



                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>Fecha Vencimiento ISSSTE
                                    Para Contestar: &nbsp; <label class="text-danger"><b>
                                        @if ($fechao != "1970/01/01" )
                                            {{ $fechaven }}
                                        @elseif($fechao == "1970/01/01" )

                                        @endif
                                    </label>
                                    </b></small></label>

                            <br>
                        </div>
                    </div>

                    <div class="row mb-3">

                        <div class="col-12">
                            <label class="col-12 col-form-label">Estatus:</label>
                            @php
                                use Carbon\Carbon;
                                $cd = new DateTime(Carbon::now());
                                $date = new DateTime($fechav);

                                if($fechao != "1970/01/01"){
                                    if($date > $cd){
                                        $abs_diff = $cd->diff($date)->days;
                                        $iabs = (int) $abs_diff;
                                        $iabst = $iabs+1+$fcount1;
                                        if ($iabs >= 20) {
                                            $fuga = 'btn-success';
                                        } elseif ($iabs < 20 && $iabs >= 10) {
                                            $fuga = 'btn-warning';
                                        } elseif ($iabs < 10) {
                                            $fuga = 'btn-danger';
                                        }
                                    } elseif($date < $cd){
                                        $fuga = 'btn-danger';
                                    }
                                }
                                elseif($fechao == "1970/01/01"){
                                    $fuga = null;
                            }




                            @endphp
                            <div class="col-2">

                                <input type="text" class="form-alerta-readonly form-control {{ $fuga }}"
                                    name="alerta1_expediente" value=
                                    @if($fechao != "1970/01/01")
                                    @if($date > $cd)
                                        "FALTAN {{$iabst ?? 'La fecha ya pasó'}} DÍAS"
                                    @elseif($date < $cd)
                                        "La fecha ya pasó"
                                    @endif
                                    @elseif($fechao == "1970/01/01")
                                    "Introduce una fecha"
                                    @endif
                                    disabled="">
                            </div>
                        </div>
                    </div>
                    <hr>


                    <div class="row">
                        <div class="col-6">
                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>
                                    Desechadas, Sobreseimientos, Requerimientos, Incidentes, Reclamos: </small></label>
                            <input type="date" value="{{ $expediente->fecha2 }}" name="fecha2" class="form-control"
                                id="floatingName" placeholder="Ingresar fecha2">
                            @error('fecha2')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="col-6">
                            @php
                                $fechad = date('m/d/Y', strtotime($expediente->fecha2 . '+ 10 days'));
                                $fechao2 = date('Y/m/d', strtotime($expediente->fecha2));
                                $fechao2t = date('Y/m/d', strtotime($expediente->fecha2 . '+ 10 days'));
                            @endphp

                            @php

                                $festivos2 = Festivos::orderBy('fecha')->where([
                                    ['fecha', '>' , "$fechao2"],
                                    ['fecha', '<' , "$fechao2t"],
                                    ])->get();
                                $fcount2 = count($festivos2);
                                $fechaden = date('d/m/Y', strtotime($expediente->fecha2 . '+ 10 days' . ' + ' .$fcount2. ' days' ));

                            @endphp

                            <br>
                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>Vencimiento Desechada:
                                    &nbsp; <label class="text-danger"><b>
                                        @if ($fechao2 != "1970/01/01" )
                                            {{ $fechaden }}
                                        @elseif($fechao2 == "1970/01/01" )

                                        @endif
                                    </label>
                                    </b></small></label>
                            <br>
                        </div>
                    </div>

                    <div class="row mb-3">

                        <div class="col-12">
                            <label class="col-12 col-form-label">Estatus:</label>
                            @php
                                $d2 = new DateTime(Carbon::now());
                                $date2 = new DateTime($fechad);

                                if($fechao2 != "1970/01/01"){
                                    if($date2 > $d2){
                                        $abs_diff2 = $date2->diff($d2)->days;
                                        $iabs2 = (int) $abs_diff2;
                                        $iabst2 = $iabs2+1+$fcount2;
                                        if ($iabs2 >= 8) {
                                            $f2 = 'btn-success';
                                        } elseif ($iabs2 < 8 && $iabs2 >= 4) {
                                            $f2 = 'btn-warning';
                                        } elseif ($iabs2 < 4) {
                                            $f2 = 'btn-danger';
                                        }

                                    } elseif($date2 < $d2){
                                        $f2 = 'btn-danger';
                                    }
                                }
                                elseif($fechao2 == "1970/01/01"){
                                    $f2 = null;
                                }



                            @endphp
                            <div class="col-2">
                                <input type="text" class="form-alerta-readonly form-control {{ $f2 }}"
                                    name="alerta1_expediente" value=
                                    @if($fechao2 != "1970/01/01")
                                    @if($date2 > $d2)
                                        "FALTAN {{$iabst2 ?? 'La fecha ya pasó'}} DÍAS"
                                    @elseif($date2 < $d2)
                                        "La fecha ya pasó"
                                    @endif
                                    @elseif($fechao2 == "1970/01/01")
                                        "Introduce una fecha"
                                    @endif
                                     disabled="">
                            </div>
                        </div>
                    </div>
                    <hr>


                    <div class="row">
                        <div class="col-6">
                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>
                                    Admision de Demanda: </small></label>
                            <input type="date" value="{{ $expediente->fecha3 }}" name="fecha3" class="form-control"
                                id="floatingName" placeholder="Ingresar fecha3">
                            @error('fecha3')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="col-6">
                            @php
                                $fechad3 = date('m/d/Y', strtotime($expediente->fecha3 . '+ 30 days'));
                                $fechao3 = date('Y/m/d', strtotime($expediente->fecha3));
                                $fechao3t = date('Y/m/d', strtotime($expediente->fecha3 . '+ 30 days'));
                            @endphp
                            <br>

                            @php
                                $festivos3 = Festivos::orderBy('fecha')->where([
                                    ['fecha', '>' , "$fechao3"],
                                    ['fecha', '<' , "$fechao3t"],
                                    ])->get();
                                $fcount3 = count($festivos3);
                                $fechaden3 = date('d/m/Y', strtotime($expediente->fecha3 . '+ 30 days' . ' + ' .$fcount3. ' days'  ));
                            @endphp

                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>Contestación ISSSTE:&nbsp;
                                    <label class="text-danger"><b>
                                        @if ($fechao3 != "1970/01/01" )
                                            {{ $fechaden3 }}
                                        @elseif($fechao3 == "1970/01/01" )

                                        @endif
                                    </label> </b></small></label>
                        </div>
                    </div>

                    <div class="row mb-3">

                        <div class="col-12">
                            <label class="col-12 col-form-label">Estatus:</label>
                            @php
                                $d3 = new DateTime(Carbon::now());
                                $date3 = new DateTime($fechad3);

                                if($fechao3 != "1970/01/01"){
                                    if($date3 > $d3){
                                        $abs_diff3 = $date3->diff($d3)->days;
                                        $iabs3 = (int) $abs_diff3;
                                        $iabst3 = $iabs3+1+$fcount3;
                                    if ($iabs3 >= 20) {
                                        $f3 = 'btn-success';
                                    } elseif ($iabs3 < 20 && $iabs3 >= 10) {
                                        $f3 = 'btn-warning';
                                    } elseif ($iabs3 < 10) {
                                        $f3 = 'btn-danger';
                                    }

                                    } elseif($date3 < $d3){
                                        $f3 = 'btn-danger';
                                    }
                                }
                                elseif($fechao3 == "1970/01/01"){
                                    $f3 = null;
                            }


                            @endphp
                            <div class="col-2">
                                <input type="text" class="form-alerta-readonly form-control {{ $f3 }}"
                                    name="alerta1_expediente" value=
                                    @if($fechao3 != "1970/01/01")
                                    @if($date3 > $d3)
                                        "FALTAN {{$iabst3 ?? 'La fecha ya pasó'}} DÍAS"
                                    @elseif($date3 < $d3)
                                        "La fecha ya pasó"
                                    @endif
                                    @elseif($fechao3 == "1970/01/01")
                                        "Introduce una fecha"
                                    @endif
                                    disabled="">
                            </div>
                        </div>
                    </div>
                    <hr>


                    <div class="row">
                        <div class="col-6">
                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>
                                    Fecha de Ampliación Admitida: </small></label>
                            <input type="date" value="{{ $expediente->fecha4 }}" name="fecha4" class="form-control"
                                id="floatingName" placeholder="Ingresar fecha4">
                            @error('fecha4')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            @php
                                $fechad4 = date('m/d/Y', strtotime($expediente->fecha4 . '+ 15 days'));
                                $fechao4 = date('Y/m/d', strtotime($expediente->fecha4));
                                $fechao4t = date('Y/m/d', strtotime($expediente->fecha4 . '+ 15 days'));
                            @endphp
                            <br>

                            @php
                                $festivos4 = Festivos::orderBy('fecha')->where([
                                    ['fecha', '>' , "$fechao4"],
                                    ['fecha', '<' , "$fechao4t"],
                                    ])->get();
                                $fcount4 = count($festivos4);
                                $fechaden4 = date('d/m/Y', strtotime($expediente->fecha4 . '+ 15 days' . ' + ' .$fcount4. ' days' ));
                            @endphp

                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>Fecha de Vencimiento Para
                                    Contestar Ampliación:&nbsp; <label class="text-danger"><b>
                                        @if ($fechao4 != "1970/01/01" )
                                            {{ $fechaden4 }}
                                        @elseif($fechao4 == "1970/01/01" )

                                        @endif
                                    </label> </b></small></label>



                        </div>
                    </div>

                    <div class="row mb-3">

                        <div class="col-12">
                            <label class="col-12 col-form-label">Estatus:</label>
                            @php
                                $d4 = new DateTime(Carbon::now());
                                $date4 = new DateTime($fechad4);

                                if($fechao4 != "1970/01/01"){
                                    if($date4 > $d4){
                                        $abs_diff4 = $date4->diff($d4)->days;
                                        $iabs4 = (int) $abs_diff4;
                                        $iabst4 = $iabs4+1+$fcount4;
                                    if ($iabs4 >= 8) {
                                        $f4 = 'btn-success';
                                    } elseif ($iabs4 < 8 && $iabs4 >= 4) {
                                        $f4 = 'btn-warning';
                                    } elseif ($iabs4 < 4) {
                                        $f4 = 'btn-danger';
                                    }

                                    } elseif($date4 < $d4){
                                    $f4 = 'btn-danger';
                                    }
                                }
                                elseif($fechao4 == "1970/01/01"){
                                    $f4 = null;
                                }


                            @endphp
                            <div class="col-2">
                                <input type="text" class="form-alerta-readonly form-control {{ $f4 }}"
                                    name="alerta1_expediente" value=
                                    @if($fechao4 != "1970/01/01")
                                    @if($date4 > $d4)
                                    "FALTAN {{$iabst4 ?? 'La fecha ya pasó'}} DÍAS"
                                    @elseif($date4 < $d4)
                                        "La fecha ya pasó"
                                    @endif
                                    @elseif($fechao4 == "1970/01/01")
                                        "Introduce una fecha"
                                    @endif
                                    disabled="">
                            </div>
                        </div>
                    </div>
                    <hr>


                    <div class="row">
                        <div class="col-6">
                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>
                                    Fecha Boletin Oficial: </small></label>
                            <input type="date" value="{{ $expediente->fecha5 }}" name="fecha5" class="form-control"
                                id="floatingName" placeholder="Ingresar fecha5">
                            @error('fecha5')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            @php
                                $fechad5 = date('m/d/Y', strtotime($expediente->fecha5 . '+ 45 days'));
                                $fechao5 = date('Y/m/d', strtotime($expediente->fecha5));
                                $fechao5t = date('Y/m/d', strtotime($expediente->fecha5 . '+ 45 days'));
                            @endphp
                            <br>

                            @php
                                $festivos5 = Festivos::orderBy('fecha')->where([
                                    ['fecha', '>' , "$fechao5"],
                                    ['fecha', '<' , "$fechao5t"],
                                    ])->get();
                                $fcount5 = count($festivos5);
                                $fechaden5 = date('d/m/Y', strtotime($expediente->fecha5 . '+ 45 days' . ' + ' .$fcount5. ' days' ));
                            @endphp



                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>Dictamen de
                                    Sentencia:&nbsp; <label class="text-danger"><b>
                                        @if ($fechao5 != "1970/01/01" )
                                            {{ $fechaden5 }}
                                        @elseif($fechao5 == "1970/01/01" )

                                        @endif

                                    </label>
                                    </b></small></label>


                        </div>
                    </div>

                    <div class="row mb-3">

                        <div class="col-12">
                            <label class="col-12 col-form-label">Estatus:</label>
                            @php
                                $d5 = new DateTime(Carbon::now());
                                $date5 = new DateTime($fechad5);

                                if($fechao5 != "1970/01/01"){
                                    if($date5 > $d5){
                                        $abs_diff5 = $date5->diff($d5)->days;
                                        $iabs5 = (int) $abs_diff5;
                                        $iabst5 = $iabs5+1+$fcount5;
                                    if ($iabs5 >= 35) {
                                        $f5 = 'btn-success';
                                    } elseif ($iabs5 < 35 && $iabs5 >= 15) {
                                        $f5 = 'btn-warning';
                                    } elseif ($iabs5 < 15) {
                                        $f5 = 'btn-danger';
                                    }

                                    } elseif($date5 < $d5){
                                    $f5 = 'btn-danger';
                                    }
                                }
                                elseif($fechao5 == "1970/01/01"){
                                    $f5 = null;
                            }


                            @endphp
                            <div class="col-2">
                                <input type="text" class="form-alerta-readonly form-control {{ $f5 }}"
                                    name="alerta1_expediente" value=
                                    @if($fechao5 != "1970/01/01")
                                    @if($date5 > $d5)
                                    "FALTAN {{$iabst5 ?? 'La fecha ya pasó'}} DÍAS"
                                    @elseif($date5 < $d5)
                                        "La fecha ya pasó"
                                    @endif
                                    @elseif($fechao5 == "1970/01/01")
                                        "Introduce una fecha"
                                    @endif
                                    disabled="">
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="col-md-12">
                        <div class="form-floathing">
                            <label for="nombre_archivos">Documentación de Actores</label>
                            <input type="file" name="nombre_archivos[]" class="form-control" multiple>
                        </div>
                    </div>


                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('expedientes.index') }}" type="reset" class="btn btn-secondary">Regresar</a>
                    </div>
                </form><!-- End floating Labels Form -->
            </div>



            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                {{-- Aqui empiza el segundo tab --}}
                <!-- Floating Labels Form -->
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">Num. Archivo</th>
                            <th scope="col">nombre</th>
                            <th scope="col">Expediente Id</th>
                            <th scope="col">Fecha Creacion</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($archivos_expedientes as $archivos_expediente)
                            <tr>
                                <th>{{ $archivos_expediente->id }}</th>
                                <th>{{ $archivos_expediente->nombre }}</th>
                                <th>{{ $archivos_expediente->expediente_id }}</th>
                                <th>{{ $archivos_expediente->created_at }}</th>

                                <th class="row">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        @can('expedientes-delete')
                                            <a class="btn btn-sm btn-outline-dark" id="delete"
                                                href="{{ url('archivosexpedientes/delete/' . $archivos_expediente->id ."/" . $expediente->id) }}"><i
                                                    class="bi bi-trash-fill"></i></a>
                                        @endcan
                                    </div>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End floating Labels Form -->
            </div>

            <div class="tab-pane fade" id="proceso" role="tabpanel" aria-labelledby="proceso-tab">
                <a href="proceso/index"></a>
            </div>

        </div>
    </div>
@endsection
