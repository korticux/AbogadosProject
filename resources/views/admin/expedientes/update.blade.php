@extends('admin.admin_master')


@section('admin')
    <div class="card-body">
        @php
            if (empty($expediente->region->numero))
            $rn = "";
            elseif ($expediente->region->numero != null)
            $rn = $expediente->region->numero;
        @endphp
        <h5 class="mb-0">Actualización del Expediente <b>No. ({{$expediente->numero . " / " . $expediente->ano . " - " . $rn . " - " . $expediente->sala . " - " . $expediente->ponencia}})
                {{ $expediente->actor->nombre ?? 'Ninguno'}}</b></h5>
        <hr>

        <!-- TABS xd -->
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
                <form class="row g-3" method="POST" action="{{ route('expedientes.update', $expediente->id) }}" enctype="multipart/form-data">
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
                                <option value="{{$expediente->region->id ?? ''}}">Selecciona una región</option>
                                @foreach ($regiones as $region)
                                    <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                                @endforeach
                                <option value="">Ninguno</option>
                            </select>
                        </div>
                    </div>



                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Actor actual: <b>
                                {{ $expediente->actor->nombre ?? 'Ninguno'}}</b></label>
                        <div class="form-floathing col-sm-5">
                            <select name="actor_id" class="form-select" aria-label="Default select example">
                                <option value="{{$expediente->actor->id ?? ''}}">Selecciona un actor</option>
                                @foreach ($actores as $actor)
                                    <option value="{{ $actor->id }}">{{ $actor->nombre }}</option>
                                @endforeach
                                <option value="">Ninguno</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Tramite actual: <b>
                                {{ $expediente->tramite->nombre ?? 'Ninguno'}}</b></label>
                        <div class="form-floathing col-sm-5">
                            <select name="tramite_id" class="form-select" aria-label="Default select example">
                                <option value="{{$expediente->tramite->id ?? ''}}">Selecciona un tramite</option>
                                @foreach ($tramites as $tramite)
                                    <option value="{{ $tramite->id }}">{{ $tramite->nombre }}</option>
                                @endforeach
                                <option value="">Ninguno</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label">Estatus actual: <b>
                                {{ $expediente->estatus->nombre  ?? 'Ninguno'}}</b></label>
                        <div class="form-floathing col-sm-5">
                            <select name="estatus_id" class="form-select" aria-label="Default select example">
                               <option value="{{$expediente->estatus->id ?? ''}}">Selecciona un estatus</option>
                                @foreach ($estatus as $estatus)
                                    <option value="{{ $estatus->id }}">{{ $estatus->nombre }}</option>
                                @endforeach

                            </select>
                        </div>
                        <br> <br>
                    </div>
                    @php
                        use App\Models\Cobranzas;
                        $abonado = DB::table("cobranzas")->where("actor_id","=",$expediente->actor->id)->get();
                        $conteo = count($abonado);
                        if($conteo >= 1){
                            $abon = $abonado[0]->monto_percibido;
                            $pendiente = $expediente->actor->honorario - $abonado[0]->monto_percibido;
                        }elseif($conteo == 0){
                            $abon = '0';
                            $pendiente = '0';
                        }else{
                            $abon = '0';
                            $pendiente = '0';
                        }



                    @endphp

                    <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="number" disabled value="{{$expediente->actor->honorario}}" name="honorario" class="form-control" id="floatingName"
                            placeholder="Ingresar honorario negociado">
                            @error('honorario')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                            <label for="honorario">Honorario negociado</label>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" disabled value="{{$abon}}" name="percibido" class="form-control"
                                id="floatingName" placeholder="Ingresar">
                            <label for="Nombre">Monto percibido</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" disabled value="{{number_format($pendiente, 2)}}" name="pendiente" class="form-control"
                                id="floatingName" placeholder="Ingresar pendiente">
                            <label for="Nombre">Monto pendiente</label>
                        </div>
                        <br>
                    </div>
                    <div class="col-md-4">
                        <div class="form-floating">
                            <input type="text" disabled value="{{$expediente->actor->tipodemanda ?? ''}}" name="pendiente" class="form-control"
                                id="floatingName" placeholder="Ingresar pendiente">
                            <label for="Nombre">Tipo de demanda</label>
                        </div>
                    </div>
                    </div>
                    <br><br>
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
                        <div class="col-6">
                            <label class="col-6 col-form-label">Estatus:</label>
                            @php
                                use Carbon\Carbon;
                                $cd = new DateTime(Carbon::now());
                                $date = new DateTime($fechav);

                                if($fechao != "1970/01/01"){
                                    if($date > $cd){
                                        $abs_diff = $cd->diff($date)->days;
                                        $iabs = (int) $abs_diff;
                                        $iabst = $iabs+2+$fcount1;
                                        if ($iabst >= 20) {
                                            $fuga = 'btn-success';
                                        } elseif ($iabst < 20 && $iabst >= 10) {
                                            $fuga = 'btn-warning';
                                        } elseif ($iabst < 10) {
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
                            <div class="col-4">
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

                        <div class="col-md-4">
                            <div class="form-floathing">
                                <label for="comentario1">Comentarios</label>
                                <textarea name="comentario1" class="form-control" cols="10" rows="2">{{$expediente->comentario1}}</textarea>
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

                        <div class="col-6">
                            <label class="col-6 col-form-label">Estatus:</label>
                            @php
                                $d2 = new DateTime(Carbon::now());
                                $date2 = new DateTime($fechad);

                                if($fechao2 != "1970/01/01"){
                                    if($date2 > $d2){
                                        $abs_diff2 = $date2->diff($d2)->days;
                                        $iabs2 = (int) $abs_diff2;
                                        $iabst2 = $iabs2+1+$fcount2;
                                        if ($iabst2 >= 8) {
                                            $f2 = 'btn-success';
                                        } elseif ($iabst2 < 8 && $iabst2 >= 4) {
                                            $f2 = 'btn-warning';
                                        } elseif ($iabst2 < 4) {
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

                            <div class="col-4">
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

                        <div class="col-md-3">
                            <label>El tipo es: <b>{{$expediente->tipo_expediente}}</b></label>
                            <br>
                            <select name="tipo_expediente" class="form-select" aria-label="Default select example">
                                <option value="{{$expediente->tipo_expediente ?? ''}}">Selecciona el tipo</option>
                                <option value="Desechada">Desechada</option>
                                <option value="Sobreseimiento">Sobreseimiento</option>
                                <option value="Requerimiento">Requerimiento</option>
                                <option value="Incidentes">Incidentes</option>
                                <option value="Reclamos">Reclamos</option>
                            </select>
                        </div>



                        <div class="col-md-3">
                            <div class="form-floathing">
                                <label for="comentario2">Comentarios</label>
                                <textarea name="comentario2" class="form-control" cols="10" rows="2">{{$expediente->comentario2}}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>


                    <div class="row">
                        <div class="col-6">
                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>Ingreso de  demanda</small></label>
                            <input type="date" value="{{ $expediente->fecha6 }}" name="fecha6" class="form-control"
                                id="floatingName" placeholder="Ingresar fecha6">
                            @error('fecha6')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="col-6">
                            @php
                                $fechad6 = date('m/d/Y', strtotime($expediente->fecha6 . '+ 15 days'));

                                $fechao6 = date('Y/m/d', strtotime($expediente->fecha6));
                                $fechao6t = date('Y/m/d', strtotime($expediente->fecha6 . '+ 15 days'));
                            @endphp
                            <br>

                            @php
                                $festivos6 = Festivos::orderBy('fecha')->where([
                                    ['fecha', '>' , "$fechao6"],
                                    ['fecha', '<' , "$fechao6t"],
                                    ])->get();
                                $fcount6 = count($festivos6);
                                $fechaden6 = date('d/m/Y', strtotime($expediente->fecha6 . '+ 15 days' . ' + ' .$fcount6. ' days' ));


                            @endphp

                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>Fecha de vencimiento: &nbsp; <label class="text-danger"><b>
                                        @if ($fechao6 != "1970/01/01" )
                                            {{ $fechaden6 }}
                                        @elseif($fechao6 == "1970/01/01" )

                                        @endif
                                    </label>
                                    </b></small></label>
                            <br>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <label class="col-6 col-form-label">Estatus:</label>
                            @php
                                $d6 = new DateTime(Carbon::now());
                                $date6 = new DateTime($fechad6);

                                if($fechao6 != "1970/01/01"){
                                    if($date6 > $d6){
                                        $abs_diff6 = $d6->diff($date6)->days;
                                        $iabs6 = (int) $abs_diff6;
                                        $iabst6 = $iabs6+2+$fcount6;
                                        if ($iabst6 >= 10) {
                                            $f6 = 'btn-success';
                                        } elseif ($iabst6 < 10 && $iabst6 >= 5) {
                                            $f6 = 'btn-warning';
                                        } elseif ($iabst6 < 5) {
                                            $f6 = 'btn-danger';
                                        }
                                    } elseif($date6 < $d6){
                                        $f6 = 'btn-danger';
                                    }
                                }
                                elseif($fechao6 == "1970/01/01"){
                                    $f6 = null;
                            }

                            @endphp
                            <div class="col-4">
                                <input type="text" class="form-alerta-readonly form-control {{ $f6 }}"
                                    name="alerta1_expediente" value=
                                    @if($fechao6 != "1970/01/01")
                                    @if($date6 > $d6)
                                        "FALTAN {{$iabst6 ?? 'La fecha ya pasó'}} DÍAS"
                                    @elseif($date6 < $d6)
                                        "La fecha ya pasó"
                                    @endif
                                    @elseif($fechao6 == "1970/01/01")
                                    "Introduce una fecha"
                                    @endif
                                    disabled="">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-floathing">
                                <label for="comentario6">Comentarios</label>
                                <textarea name="comentario6" class="form-control" cols="10" rows="2">{{$expediente->comentario6}}</textarea>
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

                        <div class="col-6">
                            <label class="col-6 col-form-label">Estatus:</label>
                            @php
                                $d3 = new DateTime(Carbon::now());
                                $date3 = new DateTime($fechad3);

                                if($fechao3 != "1970/01/01"){
                                    if($date3 > $d3){
                                        $abs_diff3 = $date3->diff($d3)->days;
                                        $iabs3 = (int) $abs_diff3;
                                        $iabst3 = $iabs3+2+$fcount3;
                                    if ($iabst3 >= 20) {
                                        $f3 = 'btn-success';
                                    } elseif ($iabst3 < 20 && $iabst3 >= 10) {
                                        $f3 = 'btn-warning';
                                    } elseif ($iabst3 < 10) {
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
                            <div class="col-4">
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
                        <div class="col-md-4">
                            <div class="form-floathing">
                                <label for="comentario3">Comentarios</label>
                                <textarea name="comentario3" class="form-control" cols="10" rows="2">{{$expediente->comentario3}}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>



                    <div class="row">
                        <div class="col-6">
                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>
                                    Contestación de Demanda: </small></label>
                            <input type="date" value="{{ $expediente->fecha7 }}" name="fecha7" class="form-control"
                                id="floatingName" placeholder="Ingresar fecha7">
                            @error('fecha7')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="col-6">
                            @php
                                $fechad7 = date('m/d/Y', strtotime($expediente->fecha7 . '+ 33 days'));
                                $fechao7 = date('Y/m/d', strtotime($expediente->fecha7));
                                $fechao7t = date('Y/m/d', strtotime($expediente->fecha7 . '+ 33 days'));
                            @endphp
                            <br>

                            @php
                                $festivos7 = Festivos::orderBy('fecha')->where([
                                    ['fecha', '>' , "$fechao7"],
                                    ['fecha', '<' , "$fechao7t"],
                                    ])->get();
                                $fcount7 = count($festivos7);
                                $fechaden7 = date('d/m/Y', strtotime($expediente->fecha7 . '+ 34 days' . ' + ' .$fcount7. ' days'  ));
                            @endphp

                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>Fecha de vencimiento:&nbsp;
                                    <label class="text-danger"><b>
                                        @if ($fechao7 != "1970/01/01" )
                                            {{ $fechaden7 }}
                                        @elseif($fechao7 == "1970/01/01" )

                                        @endif
                                    </label> </b></small></label>
                        </div>
                    </div>

                    <div class="row mb-3">

                        <div class="col-6">
                            <label class="col-6 col-form-label">Estatus:</label>
                            @php
                                $d7 = new DateTime(Carbon::now());
                                $date7 = new DateTime($fechad7);

                                if($fechao7 != "1970/01/01"){
                                    if($date7 > $d7){
                                        $abs_diff7 = $date7->diff($d7)->days;
                                        $iabs7 = (int) $abs_diff7;
                                        $iabst7 = $iabs7+2+$fcount7;
                                    if ($iabst7 >= 20) {
                                        $f7 = 'btn-success';
                                    } elseif ($iabst7 < 20 && $iabst7 >= 10) {
                                        $f7 = 'btn-warning';
                                    } elseif ($iabst7 < 10) {
                                        $f7 = 'btn-danger';
                                    }

                                    } elseif($date7 < $d7){
                                        $f7 = 'btn-danger';
                                    }
                                }
                                elseif($fechao7 == "1970/01/01"){
                                    $f7 = null;
                            }


                            @endphp
                            <div class="col-4">
                                <input type="text" class="form-alerta-readonly form-control {{ $f7 }}"
                                    name="alerta1_expediente" value=
                                    @if($fechao7 != "1970/01/01")
                                    @if($date7 > $d7)
                                        "FALTAN {{$iabst7 ?? 'La fecha ya pasó'}} DÍAS"
                                    @elseif($date7 < $d7)
                                        "La fecha ya pasó"
                                    @endif
                                    @elseif($fechao7 == "1970/01/01")
                                        "Introduce una fecha"
                                    @endif
                                    disabled="">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-floathing">
                                <label for="comentario7">Comentarios</label>
                                <textarea name="comentario7" class="form-control" cols="10" rows="2">{{$expediente->comentario7}}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>


                    <div class="row">
                        <div class="col-6">
                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>
                                    Ampliación ingresada: </small></label>
                            <input type="date" value="{{ $expediente->fecha8 }}" name="fecha8" class="form-control"
                                id="floatingName" placeholder="Ingresar fecha8">
                            @error('fecha8')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="col-6">
                            @php
                                $fechad8 = date('m/d/Y', strtotime($expediente->fecha8 . '+ 13 days'));
                                $fechao8 = date('Y/m/d', strtotime($expediente->fecha8));
                                $fechao8t = date('Y/m/d', strtotime($expediente->fecha8 . '+ 13 days'));
                            @endphp
                            <br>

                            @php
                                $festivos8 = Festivos::orderBy('fecha')->where([
                                    ['fecha', '>' , "$fechao8"],
                                    ['fecha', '<' , "$fechao8t"],
                                    ])->get();
                                $fcount8 = count($festivos8);
                                $fechaden8 = date('d/m/Y', strtotime($expediente->fecha8 . '+ 13 days' . ' + ' .$fcount8. ' days'  ));
                            @endphp

                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>Fecha de vencimiento:&nbsp;
                                    <label class="text-danger"><b>
                                        @if ($fechao8 != "1970/01/01" )
                                            {{ $fechaden8 }}
                                        @elseif($fechao8 == "1970/01/01" )

                                        @endif
                                    </label> </b></small></label>
                        </div>
                    </div>

                    <div class="row mb-3">

                        <div class="col-6">
                            <label class="col-6 col-form-label">Estatus:</label>
                            @php
                                $d8 = new DateTime(Carbon::now());
                                $date8 = new DateTime($fechad8);

                                if($fechao8 != "1970/01/01"){
                                    if($date8 > $d8){
                                        $abs_diff8 = $date8->diff($d8)->days;
                                        $iabs8 = (int) $abs_diff8;
                                        $iabst8 = $iabs8+1+$fcount8;
                                    if ($iabst8 >= 8) {
                                        $f8 = 'btn-success';
                                    } elseif ($iabst8 < 8 && $iabst8 >= 4) {
                                        $f8 = 'btn-warning';
                                    } elseif ($iabst8 < 4) {
                                        $f8 = 'btn-danger';
                                    }

                                    } elseif($date8 < $d8){
                                        $f8 = 'btn-danger';
                                    }
                                }
                                elseif($fechao8 == "1970/01/01"){
                                    $f8 = null;
                            }


                            @endphp
                            <div class="col-4">
                                <input type="text" class="form-alerta-readonly form-control {{ $f8 }}"
                                    name="alerta1_expediente" value=
                                    @if($fechao8 != "1970/01/01")
                                    @if($date8 > $d8)
                                        "FALTAN {{$iabst8 ?? 'La fecha ya pasó'}} DÍAS"
                                    @elseif($date8 < $d8)
                                        "La fecha ya pasó"
                                    @endif
                                    @elseif($fechao8 == "1970/01/01")
                                        "Introduce una fecha"
                                    @endif
                                    disabled="">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-floathing">
                                <label for="comentario8">Comentarios</label>
                                <textarea name="comentario8" class="form-control" cols="10" rows="2">{{$expediente->comentario8}}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>


                    <div class="row">
                        <div class="col-6">
                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>
                                    Ampliación Admitida: </small></label>
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

                        <div class="col-6">
                            <label class="col-6 col-form-label">Estatus:</label>
                            @php
                                $d4 = new DateTime(Carbon::now());
                                $date4 = new DateTime($fechad4);

                                if($fechao4 != "1970/01/01"){
                                    if($date4 > $d4){
                                        $abs_diff4 = $date4->diff($d4)->days;
                                        $iabs4 = (int) $abs_diff4;
                                        $iabst4 = $iabs4+1+$fcount4;
                                    if ($iabst4 >= 8) {
                                        $f4 = 'btn-success';
                                    } elseif ($iabst4 < 8 && $iabst4 >= 4) {
                                        $f4 = 'btn-warning';
                                    } elseif ($iabst4 < 4) {
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
                            <div class="col-4">
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

                        <div class="col-md-4">
                            <div class="form-floathing">
                                <label for="comentario4">Comentarios</label>
                                <textarea name="comentario4" class="form-control" cols="10" rows="2">{{$expediente->comentario4}}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>


                    <div class="row">
                        <div class="col-6">
                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>
                                    Contestacion de ampliación: </small></label>
                            <input type="date" value="{{ $expediente->fecha9 }}" name="fecha9" class="form-control"
                                id="floatingName" placeholder="Ingresar fecha9">
                            @error('fecha9')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="col-6">
                            @php
                                $fechad9 = date('m/d/Y', strtotime($expediente->fecha9 . '+ 18 days'));
                                $fechao9 = date('Y/m/d', strtotime($expediente->fecha9));
                                $fechao9t = date('Y/m/d', strtotime($expediente->fecha9 . '+ 18 days'));
                            @endphp
                            <br>

                            @php
                                $festivos9 = Festivos::orderBy('fecha')->where([
                                    ['fecha', '>' , "$fechao9"],
                                    ['fecha', '<' , "$fechao9t"],
                                    ])->get();
                                $fcount9 = count($festivos9);
                                $fechaden9 = date('d/m/Y', strtotime($expediente->fecha9 . '+ 18 days' . ' + ' .$fcount9. ' days'  ));
                            @endphp

                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>Fecha de vencimiento:&nbsp;
                                    <label class="text-danger"><b>
                                        @if ($fechao9 != "1970/01/01" )
                                            {{ $fechaden9 }}
                                        @elseif($fechao9 == "1970/01/01" )

                                        @endif
                                    </label> </b></small></label>
                        </div>
                    </div>

                    <div class="row mb-3">

                        <div class="col-6">
                            <label class="col-6 col-form-label">Estatus:</label>
                            @php
                                $d9 = new DateTime(Carbon::now());
                                $date9 = new DateTime($fechad9);

                                if($fechao9 != "1970/01/01"){
                                    if($date9 > $d9){
                                        $abs_diff9 = $date9->diff($d9)->days;
                                        $iabs9 = (int) $abs_diff9;
                                        $iabst9 = $iabs9+2+$fcount9;
                                    if ($iabst9 >= 12) {
                                        $f9 = 'btn-success';
                                    } elseif ($iabst9 < 8 && $iabst9 >= 4) {
                                        $f9 = 'btn-warning';
                                    } elseif ($iabst9 < 4) {
                                        $f9 = 'btn-danger';
                                    }

                                    } elseif($date9 < $d9){
                                        $f9 = 'btn-danger';
                                    }
                                }
                                elseif($fechao9 == "1970/01/01"){
                                    $f9 = null;
                            }


                            @endphp
                            <div class="col-4">
                                <input type="text" class="form-alerta-readonly form-control {{$f9}}"
                                    name="alerta1_expediente" value=
                                    @if($fechao9 != "1970/01/01")
                                    @if($date9 > $d9)
                                        "FALTAN {{$iabst9 ?? 'La fecha ya pasó'}} DÍAS"
                                    @elseif($date9 < $d9)
                                        "La fecha ya pasó"
                                    @endif
                                    @elseif($fechao9 == "1970/01/01")
                                        "Introduce una fecha"
                                    @endif
                                    disabled="">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-floathing">
                                <label for="comentario9">Comentarios</label>
                                <textarea name="comentario9" class="form-control" cols="10" rows="2">{{$expediente->comentario9}}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>


                    <div class="row">
                        <div class="col-6">
                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>
                                    Alegatos: </small></label>
                            <input type="date" value="{{ $expediente->fecha10 }}" name="fecha10" class="form-control"
                                id="floatingName" placeholder="Ingresar fecha10">
                            @error('fecha10')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="col-6">
                            @php
                                $fechad10 = date('m/d/Y', strtotime($expediente->fecha10 . '+ 7 days'));
                                $fechao10 = date('Y/m/d', strtotime($expediente->fecha10));
                                $fechao10t = date('Y/m/d', strtotime($expediente->fecha10 . '+ 7 days'));
                            @endphp
                            <br>

                            @php
                                $festivos10 = Festivos::orderBy('fecha')->where([
                                    ['fecha', '>' , "$fechao10"],
                                    ['fecha', '<' , "$fechao10t"],
                                    ])->get();
                                $fcount10 = count($festivos10);
                                $fechaden10 = date('d/m/Y', strtotime($expediente->fecha10 . '+ 7 days' . ' + ' .$fcount10. ' days'  ));
                            @endphp

                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>Fecha de vencimiento:&nbsp;
                                    <label class="text-danger"><b>
                                        @if ($fechao10 != "1970/01/01" )
                                            {{ $fechaden10 }}
                                        @elseif($fechao10 == "1970/01/01" )

                                        @endif
                                    </label> </b></small></label>
                        </div>
                    </div>

                    <div class="row mb-3">

                        <div class="col-6">
                            <label class="col-6 col-form-label">Estatus:</label>
                            @php
                                $d10 = new DateTime(Carbon::now());
                                $date10 = new DateTime($fechad10);

                                if($fechao10 != "1970/01/01"){
                                    if($date10 > $d10){
                                        $abs_diff10 = $date10->diff($d10)->days;
                                        $iabs10 = (int) $abs_diff10;
                                        $iabst10 = $iabs10+1+$fcount10;
                                    if ($iabst10 >= 4) {
                                        $f10 = 'btn-success';
                                    } elseif ($iabst10 < 4 && $iabst10 >= 2) {
                                        $f10 = 'btn-warning';
                                    } elseif ($iabst10 < 2) {
                                        $f10 = 'btn-danger';
                                    }

                                    } elseif($date10 < $d10){
                                        $f10 = 'btn-danger';
                                    }
                                }
                                elseif($fechao10 == "1970/01/01"){
                                    $f10 = null;
                            }


                            @endphp
                            <div class="col-4">
                                <input type="text" class="form-alerta-readonly form-control {{ $f10 }}"
                                    name="alerta1_expediente" value=
                                    @if($fechao10 != "1970/01/01")
                                    @if($date10 > $d10)
                                        "FALTAN {{$iabst10 ?? 'La fecha ya pasó'}} DÍAS"
                                    @elseif($date10 < $d10)
                                        "La fecha ya pasó"
                                    @endif
                                    @elseif($fechao10 == "1970/01/01")
                                        "Introduce una fecha"
                                    @endif
                                    disabled="">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-floathing">
                                <label for="comentario10">Comentarios</label>
                                <textarea name="comentario10" class="form-control" cols="10" rows="2">{{$expediente->comentario10}}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>


                    <div class="row">
                        <div class="col-6">
                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>
                                    Cierre de instrucción: </small></label>
                            <input type="date" value="{{ $expediente->fecha11 }}" name="fecha11" class="form-control"
                                id="floatingName" placeholder="Ingresar fecha11">
                            @error('fecha11')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="col-6">
                            @php
                                $fechad11 = date('m/d/Y', strtotime($expediente->fecha11 . '+ 30 days'));
                                $fechao11 = date('Y/m/d', strtotime($expediente->fecha11));
                                $fechao11t = date('Y/m/d', strtotime($expediente->fecha11 . '+ 30 days'));
                            @endphp
                            <br>

                            @php
                                $festivos11 = Festivos::orderBy('fecha')->where([
                                    ['fecha', '>' , "$fechao11"],
                                    ['fecha', '<' , "$fechao11t"],
                                    ])->get();
                                $fcount11 = count($festivos11);
                                $fechaden11 = date('d/m/Y', strtotime($expediente->fecha11 . '+ 30 days' . ' + ' .$fcount11. ' days'  ));
                            @endphp

                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>Fecha de vencimiento:&nbsp;
                                    <label class="text-danger"><b>
                                        @if ($fechao11 != "1970/01/01" )
                                            {{ $fechaden11 }}
                                        @elseif($fechao11 == "1970/01/01" )

                                        @endif
                                    </label> </b></small></label>
                        </div>
                    </div>

                    <div class="row mb-3">

                        <div class="col-6">
                            <label class="col-6 col-form-label">Estatus:</label>
                            @php
                                $d11 = new DateTime(Carbon::now());
                                $date11 = new DateTime($fechad11);

                                if($fechao11 != "1970/01/01"){
                                    if($date11 > $d11){
                                        $abs_diff11 = $date11->diff($d11)->days;
                                        $iabs11 = (int) $abs_diff11;
                                        $iabst11 = $iabs11+1+$fcount11;
                                    if ($iabst11 >= 20) {
                                        $f11 = 'btn-success';
                                    } elseif ($iabst11 < 20 && $iabst11 >= 10) {
                                        $f11 = 'btn-warning';
                                    } elseif ($iabst11 < 10) {
                                        $f11 = 'btn-danger';
                                    }

                                    } elseif($date11 < $d11){
                                        $f11 = 'btn-danger';
                                    }
                                }
                                elseif($fechao11 == "1970/01/01"){
                                    $f11 = null;
                            }


                            @endphp
                            <div class="col-4">
                                <input type="text" class="form-alerta-readonly form-control {{ $f11 }}"
                                    name="alerta1_expediente" value=
                                    @if($fechao11 != "1970/01/01")
                                    @if($date11 > $d11)
                                        "FALTAN {{$iabst11 ?? 'La fecha ya pasó'}} DÍAS"
                                    @elseif($date11 < $d11)
                                        "La fecha ya pasó"
                                    @endif
                                    @elseif($fechao11 == "1970/01/01")
                                        "Introduce una fecha"
                                    @endif
                                    disabled="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floathing">
                                <label for="comentario11">Comentarios</label>
                                <textarea name="comentario11" class="form-control" cols="10" rows="2">{{$expediente->comentario11}}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>



                    <div class="row">
                        <div class="col-6">
                            <label class="col-sm-6 col-form-label" style="width:100%;"><small>
                                Dictamen de Sentencia: </small></label>
                            <input type="date" value="{{ $expediente->fecha5 }}" name="fecha5" class="form-control"
                                id="floatingName" placeholder="Ingresar fecha5">
                            @error('fecha5')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col-6">

                            <div class="col-md-8">
                                <div class="form-floathing">
                                    <label for="comentario5">Comentarios</label>
                                    <textarea name="comentario5" class="form-control" cols="10" rows="2">{{$expediente->comentario5}}</textarea>
                                </div>
                            </div>
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


                        </div>
                    </div>

                    <div class="row mb-3">

                        {{-- <div class="col-6">
                            <label class="col-6 col-form-label">Estatus:</label>
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
                            <div class="col-4">
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
                        </div> --}}

                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-6">
                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>
                                   Recurso de revision: </small></label>
                            <input type="date" value="{{ $expediente->fecha12 }}" name="fecha12" class="form-control"
                                id="floatingName" placeholder="Ingresar fecha12">
                            @error('fecha12')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="col-6">
                            @php
                                $fechad12 = date('m/d/Y', strtotime($expediente->fecha12 . '+ 15 days'));
                                $fechao12 = date('Y/m/d', strtotime($expediente->fecha12));
                                $fechao12t = date('Y/m/d', strtotime($expediente->fecha12 . '+ 15 days'));
                            @endphp
                            <br>

                            @php
                                $festivos12 = Festivos::orderBy('fecha')->where([
                                    ['fecha', '>' , "$fechao12"],
                                    ['fecha', '<' , "$fechao12t"],
                                    ])->get();
                                $fcount12 = count($festivos12);
                                $fechaden12 = date('d/m/Y', strtotime($expediente->fecha12 . '+ 15 days' . ' + ' .$fcount12. ' days'  ));
                            @endphp

                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>Fecha de vencimiento:&nbsp;
                                    <label class="text-danger"><b>
                                        @if ($fechao12 != "1970/01/01" )
                                            {{ $fechaden12 }}
                                        @elseif($fechao12 == "1970/01/01" )

                                        @endif
                                    </label> </b></small></label>
                        </div>
                    </div>

                    <div class="row mb-3">

                        <div class="col-6">
                            <label class="col-6 col-form-label">Estatus:</label>
                            @php
                                $d12 = new DateTime(Carbon::now());
                                $date12 = new DateTime($fechad12);

                                if($fechao12 != "1970/01/01"){
                                    if($date12 > $d12){
                                        $abs_diff12 = $date12->diff($d12)->days;
                                        $iabs12 = (int) $abs_diff12;
                                        $iabst12 = $iabs12+1+$fcount12;
                                    if ($iabst12 >= 10) {
                                        $f12 = 'btn-success';
                                    } elseif ($iabst12 < 10 && $iabst12 >= 5) {
                                        $f12 = 'btn-warning';
                                    } elseif ($iabst12 < 5) {
                                        $f12 = 'btn-danger';
                                    }

                                    } elseif($date12 < $d12){
                                        $f12 = 'btn-danger';
                                    }
                                }
                                elseif($fechao12 == "1970/01/01"){
                                    $f12 = null;
                            }


                            @endphp
                            <div class="col-4">
                                <input type="text" class="form-alerta-readonly form-control {{ $f12 }}"
                                    name="alerta1_expediente" value=
                                    @if($fechao12 != "1970/01/01")
                                    @if($date12 > $d12)
                                        "FALTAN {{$iabst12 ?? 'La fecha ya pasó'}} DÍAS"
                                    @elseif($date12 < $d12)
                                        "La fecha ya pasó"
                                    @endif
                                    @elseif($fechao12 == "1970/01/01")
                                        "Introduce una fecha"
                                    @endif
                                    disabled="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floathing">
                                <label for="comentario12">Comentarios</label>
                                <textarea name="comentario12" class="form-control" cols="10" rows="2">{{$expediente->comentario12}}</textarea>
                            </div>
                        </div>
                    </div>
                    <hr>


                    <div class="row">
                        <div class="col-6">
                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>
                               Solicitud de firmeza: </small></label>
                            <input type="date" value="{{ $expediente->fecha13 }}" name="fecha13" class="form-control"
                                id="floatingName" placeholder="Ingresar fecha13">
                            @error('fecha13')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            @php
                                $fechad13 = date('m/d/Y', strtotime($expediente->fecha13 . '+ 16 days'));
                                $fechao13 = date('Y/m/d', strtotime($expediente->fecha13));
                                $fechao13t = date('Y/m/d', strtotime($expediente->fecha13 . '+ 16 days'));
                            @endphp
                            <br>

                            @php
                                $festivos13 = Festivos::orderBy('fecha')->where([
                                    ['fecha', '>' , "$fechao13"],
                                    ['fecha', '<' , "$fechao13t"],
                                    ])->get();
                                $fcount13 = count($festivos13);
                                $fechaden13 = date('d/m/Y', strtotime($expediente->fecha13 . '+ 16 days' . ' + ' .$fcount13. ' days' ));
                            @endphp



                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>Fecha de vencimiento:&nbsp; <label class="text-danger"><b>
                                        @if ($fechao13 != "1970/01/01" )
                                            {{ $fechaden13 }}
                                        @elseif($fechao13 == "1970/01/01" )

                                        @endif

                                    </label>
                                    </b></small></label>


                        </div>
                    </div>

                    <div class="row mb-3">

                        <div class="col-6">
                            <label class="col-6 col-form-label">Estatus:</label>
                            @php
                                $d13 = new DateTime(Carbon::now());
                                $date13 = new DateTime($fechad13);

                                if($fechao13 != "1970/01/01"){
                                    if($date13 > $d13){
                                        $abs_diff13 = $date13->diff($d13)->days;
                                        $iabs13 = (int) $abs_diff13;
                                        $iabst13 = $iabs13+1+$fcount13;
                                    if ($iabst13 >= 12) {
                                        $f13 = 'btn-success';
                                    } elseif ($iabst13 < 12 && $iabst13 >= 6) {
                                        $f13 = 'btn-warning';
                                    } elseif ($iabst13 < 6) {
                                        $f13 = 'btn-danger';
                                    }

                                    } elseif($date13 < $d13){
                                    $f13 = 'btn-danger';
                                    }
                                }
                                elseif($fechao13 == "1970/01/01"){
                                    $f13 = null;
                            }


                            @endphp
                            <div class="col-4">
                                <input type="text" class="form-alerta-readonly form-control {{ $f13 }}"
                                    name="alerta1_expediente" value=
                                    @if($fechao13 != "1970/01/01")
                                    @if($date13 > $d13)
                                    "FALTAN {{$iabst13 ?? 'La fecha ya pasó'}} DÍAS"
                                    @elseif($date13 < $d13)
                                        "La fecha ya pasó"
                                    @endif
                                    @elseif($fechao13 == "1970/01/01")
                                        "Introduce una fecha"
                                    @endif
                                    disabled="">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label>El actor es: <b>{{$expediente->tipo_actor}}</b></label>
                            <br>
                            <select name="tipo_actor" class="form-select" aria-label="Default select example">
                                <option value="{{$expediente->tipo_actor ?? ''}}">Selecciona el tipo</option>
                                <option value="Actor en decimo transitorio">Actor en decimo transitorio</option>
                                <option value="Actor en cuentas individuales">Actor en cuentas individuales</option>

                            </select>
                        </div>


                        <div class="col-md-3">
                            <div class="form-floathing">
                                <label for="comentario13">Comentarios</label>
                                <textarea name="comentario13" class="form-control" cols="10" rows="2">{{$expediente->comentario13}}</textarea>
                            </div>
                        </div>
                    </div>


                    <hr>


                    <div class="row">
                        <div class="col-6">
                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>
                                   Amparo: </small></label>
                            <input type="date" value="{{ $expediente->fecha14 }}" name="fecha14" class="form-control"
                                id="floatingName" placeholder="Ingresar fecha14">
                            @error('fecha14')
                                <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="col-6">
                            @php
                                $fechad14 = date('m/d/Y', strtotime($expediente->fecha14 . '+ 15 days'));
                                $fechao14 = date('Y/m/d', strtotime($expediente->fecha14));
                                $fechao14t = date('Y/m/d', strtotime($expediente->fecha14 . '+ 15 days'));
                            @endphp
                            <br>

                            @php
                                $festivos14 = Festivos::orderBy('fecha')->where([
                                    ['fecha', '>' , "$fechao14"],
                                    ['fecha', '<' , "$fechao14t"],
                                    ])->get();
                                $fcount14 = count($festivos14);
                                $fechaden14 = date('d/m/Y', strtotime($expediente->fecha14 . '+ 15 days' . ' + ' .$fcount14. ' days'  ));
                            @endphp

                            <label class="col-sm-12 col-form-label" style="width:100%;"><small>Fecha de vencimiento:&nbsp;
                                    <label class="text-danger"><b>
                                        @if ($fechao14 != "1970/01/01" )
                                            {{ $fechaden14 }}
                                        @elseif($fechao14 == "1970/01/01" )

                                        @endif
                                    </label> </b></small></label>
                        </div>
                    </div>

                    <div class="row mb-3">

                        <div class="col-6">
                            <label class="col-6 col-form-label">Estatus:</label>
                            @php
                                $d14 = new DateTime(Carbon::now());
                                $date14 = new DateTime($fechad14);

                                if($fechao14 != "1970/01/01"){
                                    if($date14 > $d14){
                                        $abs_diff14 = $date14->diff($d14)->days;
                                        $iabs14 = (int) $abs_diff14;
                                        $iabst14 = $iabs14+1+$fcount14;
                                    if ($iabst14 >= 10) {
                                        $f14 = 'btn-success';
                                    } elseif ($iabst14 < 10 && $iabst14 >= 5) {
                                        $f14 = 'btn-warning';
                                    } elseif ($iabst14 < 5) {
                                        $f14 = 'btn-danger';
                                    }

                                    } elseif($date14 < $d14){
                                        $f14 = 'btn-danger';
                                    }
                                }
                                elseif($fechao14 == "1970/01/01"){
                                    $f14 = null;
                            }


                            @endphp
                            <div class="col-4">
                                <input type="text" class="form-alerta-readonly form-control {{ $f14 }}"
                                    name="alerta1_expediente" value=
                                    @if($fechao14 != "1970/01/01")
                                    @if($date14 > $d14)
                                        "FALTAN {{$iabst14 ?? 'La fecha ya pasó'}} DÍAS"
                                    @elseif($date14 < $d14)
                                        "La fecha ya pasó"
                                    @endif
                                    @elseif($fechao14 == "1970/01/01")
                                        "Introduce una fecha"
                                    @endif
                                    disabled="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floathing">
                                <label for="comentario14">Comentarios</label>
                                <textarea name="comentario14" class="form-control" cols="10" rows="2">{{$expediente->comentario14}}</textarea>
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
                                        <a class="btn btn-sm btn-outline-dark" id="download"
                                        href="{{ url('expedientes/download', $archivos_expediente->id) }}"><i
                                            class="bi bi-eye-fill"></i></a>

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
