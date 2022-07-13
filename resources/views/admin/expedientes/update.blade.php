@extends('admin.admin_master')


@section('admin')
    <div class="card-body">
        <h5 class="mb-0">Actualización del Expediente <b>No. ({{$expediente->numero}}) {{$expediente->actor->nombre }}</b></h5>
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
    </ul>

    <div class="tab-content pt-2" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <br>

            <!-- Floating Labels Form -->
            <form class="row g-3" method="POST" action="{{ route('expedientes.update', $expediente->id)}}">
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
                            <input type="text" value="{{ $expediente->ponencia }}" name="ponencia" class="form-control"
                                id="floatingName" placeholder="Ingresar ponencia">
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
                    <label class="col-sm-4 col-form-label">Región: <b>
                        {{ $expediente->region->nombre }} </b></label>
                    <div class="form-floathing col-sm-5">
                        <select name="region_id" class="form-select" aria-label="Default select example">
                            <option selected disabled>Selecciona Una Region</option>
                            @foreach ($regiones as $region)
                                <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-4 ">Fecha Inicial del Expediente:</label>
                    <div class="form-floating col-sm-5">
                        <input type="date" value="{{ $expediente->fecha }}" name="fecha" class="form-control" id="floatingName" placeholder="Ingresar fecha_de_ingreso">
                        @error('fecha')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">Lugar de Petición: <b>
                        {{ $expediente->peticion->lugar }}</b></label>
                    <div class="form-floathing col-sm-5">
                        <select name="peticion_id" class="form-select" aria-label="Default select example">
                            <option selected disabled>Selecciona Petición</option>
                            @foreach ($peticiones as $peticion)
                                <option value="{{ $peticion->id }}">{{ $peticion->lugar }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">Actor: <b>
                        {{ $expediente->actor->nombre }}</b></label>
                    <div class="form-floathing col-sm-5">
                        <select name="actor_id" class="form-select" aria-label="Default select example">
                            <option selected disabled>Selecciona Un Actor</option>
                            @foreach ($actores as $actor)
                                <option value="{{ $actor->id }}">{{ $actor->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">Dependencia: <b>
                        {{ $expediente->dependencia->nombre }}</b></label>
                    <div class="form-floathing col-sm-5">
                        <select name="dependencia_id" class="form-select" aria-label="Default select example">
                            <option selected disabled>Selecciona Una Dependencia</option>
                            @foreach ($dependencias as $dependencia)
                                <option value="{{ $dependencia->id }}">{{ $dependencia->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">Tramite: <b>
                        {{ $expediente->tramite->nombre }}</b></label>
                        <div class="form-floathing col-sm-5">
                            <select name="tramite_id" class="form-select" aria-label="Default select example">
                                <option selected disabled>Selecciona Un Tramite</option>
                                @foreach ($tramites as $tramite)
                                    <option value="{{ $tramite->id }}">{{ $tramite->nombre }}</option>
                                @endforeach
                            </select>
                    </div>
                </div>


                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">Estatus: <b>
                        {{ $expediente->estatus->nombre }}</b></label>
                    <div class="form-floathing col-sm-5">
                        <select name="estatus_id" class="form-select" aria-label="Default select example">
                            <option selected disabled>Selecciona Un Estatus</option>
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
                        <textarea class="form-control" value="{{ $expediente->comentarios }}" name="comentarios"
                             rows="10"> {{ $expediente->comentarios }} </textarea>
                        @error('Comentarios')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                </div>
            </div>
            <hr>


            <h5 class="row-sm-3 col-form-label" style="width:100%">Estatus<br>El sistema calcula los resultados en base a los días actuales y festivos. <br> <br></h5>



            <div class="row">
                <div class="col-6">
                    <label class="col-sm-12 col-form-label" style="width:100%;"><small>Ingreso de Petición ISSSTE</small></label>
                        <input type="date" value="{{ $expediente->fecha1 }}" name="fecha1" class="form-control"
                            id="floatingName" placeholder="Ingresar fecha1">
                    @error('fecha1')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>

                <div class="col-6">
                    @php
                        $fechav = date("m/d/Y",strtotime($expediente->fecha1."+ 30 days"));
                        $fechaven = date("d/m/Y",strtotime($expediente->fecha1."+ 30 days"));
                    @endphp
                    <br>

                    <label class="col-sm-12 col-form-label" style="width:100%;"><small>Fecha Vencimiento ISSSTE Para Contestar: &nbsp; <label class="text-danger"><b> {{$fechaven}} </label> </b></small></label>

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
                        $abs_diff = ($date->diff($cd)->days);
                        $iabs = (int) $abs_diff;

                        if($iabs >= 20 ){
                            $fuga = 'btn-success';
                        }elseif($iabs < 20 && $iabs >= 10 ){
                            $fuga = 'btn-warning';
                        }elseif($iabs < 10){
                            $fuga = 'btn-danger';
                        }

                   @endphp
                   <div class="col-2">
                    <input type="text" class="form-alerta-readonly form-control {{$fuga}}"
                    name="alerta1_expediente" value="FALTAN {{$abs_diff}} DÍAS" disabled="">
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
                    $fechad = date("m/d/Y",strtotime($expediente->fecha2."+ 10 days"));
                    $fechaden = date("d/m/Y",strtotime($expediente->fecha2."+ 10 days"));
                @endphp
                <br>
                <label class="col-sm-12 col-form-label" style="width:100%;"><small>Vencimiento Desechada: &nbsp; <label class="text-danger"><b> {{$fechaden}} </label> </b></small></label>
                <br>
            </div>
        </div>

        <div class="row mb-3">

            <div class="col-12">
               <label class="col-12 col-form-label">Estatus:</label>
                @php
                    $d2 = new DateTime(Carbon::now());
                    $date2 = new DateTime($fechad);
                    $abs_diff2 = ($date2->diff($d2)->days);
                    $iabs2 = (int) $abs_diff2;

                    if($iabs2 >= 8 ){
                        $f2 = 'btn-success';
                    }elseif($iabs2 < 8 && $iabs2 >= 4 ){
                        $f2 = 'btn-warning';
                    }elseif($iabs2 < 4){
                        $f2 = 'btn-danger';
                    }

               @endphp
               <div class="col-2">
                <input type="text" class="form-alerta-readonly form-control {{$f2}}"
                name="alerta1_expediente" value="FALTAN {{$abs_diff2}} DÍAS" disabled="">
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
                $fechad3 = date("m/d/Y",strtotime($expediente->fecha3."+ 30 days"));
                $fechaden3 = date("d/m/Y",strtotime($expediente->fecha3."+ 30 days"));
            @endphp
             <br>
            <label class="col-sm-12 col-form-label" style="width:100%;"><small>Contestación ISSSTE:&nbsp; <label class="text-danger"><b> {{$fechaden3}} </label> </b></small></label>



        </div>
    </div>

        <div class="row mb-3">

            <div class="col-12">
            <label class="col-12 col-form-label">Estatus:</label>
                @php
                    $d3 = new DateTime(Carbon::now());
                    $date3 = new DateTime($fechad3);
                    $abs_diff3 = ($date3->diff($d3)->days);
                    $iabs3 = (int) $abs_diff3;

                    if($iabs3 >= 20 ){
                        $f3 = 'btn-success';
                    }elseif($iabs3 < 20 && $iabs3 >= 10 ){
                        $f3 = 'btn-warning';
                    }elseif($iabs3 < 10){
                        $f3 = 'btn-danger';
                    }

            @endphp
            <div class="col-2">
                <input type="text" class="form-alerta-readonly form-control {{$f3}}"
                name="alerta1_expediente" value="FALTAN {{$abs_diff3}} DÍAS" disabled="">
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
                $fechad4 = date("m/d/Y",strtotime($expediente->fecha4."+ 13 days"));
                $fechaden4 = date("d/m/Y",strtotime($expediente->fecha4."+ 13 days"));
            @endphp
            <br>
            <label class="col-sm-12 col-form-label" style="width:100%;"><small>Fecha de Vencimiento Para Contestar Ampliación:&nbsp; <label class="text-danger"><b> {{$fechaden4}} </label> </b></small></label>



        </div>
    </div>

    <div class="row mb-3">

        <div class="col-12">
           <label class="col-12 col-form-label">Estatus:</label>
            @php
                $d4 = new DateTime(Carbon::now());
                $date4 = new DateTime($fechad4);
                $abs_diff4 = ($date4->diff($d4)->days);
                $iabs4 = (int) $abs_diff4;

                if($iabs4 >= 8 ){
                    $f4 = 'btn-success';
                }elseif($iabs4 < 8 && $iabs4 >= 4 ){
                    $f4 = 'btn-warning';
                }elseif($iabs4 < 4){
                    $f4 = 'btn-danger';
                }
           @endphp
           <div class="col-2">
            <input type="text" class="form-alerta-readonly form-control {{$f4}}"
            name="alerta1_expediente" value="FALTAN {{$abs_diff4}} DÍAS" disabled="">
           </div>
       </div>
   </div>
   <hr>


    <div class="row">
        <div class="col-6">
            <label class="col-sm-12 col-form-label" style="width:100%;"><small>
                Fecha Boletin Oficial: </small></label>
                <input type="date" value="{{ $expediente->fecha5 }}" name="fecha5" class="form-control"
                    id="floatingName" placeholder="Ingresar fecha4">
            @error('fecha5')
                <span class="text-danger"> {{ $message }} </span>
            @enderror
        </div>
        <div class="col-6">
            @php
                $fechad5 = date("m/d/Y",strtotime($expediente->fecha4."+ 45 days"));
                $fechaden5 = date("d/m/Y",strtotime($expediente->fecha4."+ 45 days"));
            @endphp
            <br>
            <label class="col-sm-12 col-form-label" style="width:100%;"><small>Dictamen de Sentencia:&nbsp; <label class="text-danger"><b> {{$fechaden5}} </label> </b></small></label>


        </div>
    </div>

    <div class="row mb-3">

        <div class="col-12">
           <label class="col-12 col-form-label">Estatus:</label>
            @php
                $d5 = new DateTime(Carbon::now());
                $date5 = new DateTime($fechad5);
                $abs_diff5 = ($date5->diff($d5)->days);
                $iabs5 = (int) $abs_diff5;

                if($iabs5 >= 35 ){
                    $f5 = 'btn-success';
                }elseif($iabs5 < 35 && $iabs5 >= 15 ){
                    $f5 = 'btn-warning';
                }elseif($iabs5 < 15){
                    $f5 = 'btn-danger';
                }
           @endphp
           <div class="col-2">
            <input type="text" class="form-alerta-readonly form-control {{$f5}}"
            name="alerta1_expediente" value="FALTAN {{$abs_diff5}} DÍAS" disabled="">
           </div>
       </div>
   </div>
   <hr>


                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('expedientes.index') }}" type="reset" class="btn btn-secondary">Regresar</a>
                </div>
            </form><!-- End floating Labels Form -->
        </div>



         <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

            {{-- Aqui empiza el segundo tab --}}
             <!-- Floating Labels Form -->
             <form class="row g-3" method="POST" action="{{ route('expedientes.update', $expediente->id) }}">
            <div class="col-md-12">
                <div class="border p-3 rounded">
                    <h6 class="mb-0 text-uppercase">Carga de Archivos Del Expediente<br><br><b>Archivos Soportados: .pdf, .xls, .xlsx, .doc, .docx, .png, .jpg, .jpeg, .bmp, .ppt, .pptx</b></h6>
                    <hr>
                    <div class="col-6">
                        <label class="form-label">Título del Archivo:</label>
                        <input type="text" name="nombre_earchivos" class="form-control" autocomplete="off" required="">
                    </div>
                    <br>
                    <div class="col-6">
                        <input type="file" name="archivo_earchivos" accept=".pdf, .xls, .xlsx, .doc, .docx, .png, .jpeg, .bmp, .jpg, .ppt, .pptx" required="">
                    </div>
                    <br>
                    <div class="col-6">
                        <input type="submit" name="submit2" class="btn btn-primary" value="Cargar Archivo">
                    </div>
                </div>
            </div>
        </form><!-- End floating Labels Form -->
        </div>
    </div>
</div>
@endsection
