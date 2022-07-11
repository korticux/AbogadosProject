@extends('admin.admin_master')


@section('admin')
    <div class="card-body">
        <h5 class="card-title">Actualizar Expediente</h5>

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
        <!-- Floating Labels Form -->



    <!--<div class="card">-->


            <!-- Floating Labels Form -->
            <form class="row g-3" method="POST" action="{{ route('expedientes.update', $expediente->id) }}">
                @csrf
                <div class="col-md-12">
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

                <div class="col-md-6">
                    Región
                    <div class="form-floathing">

                        <select name="region_id" class="form-select" aria-label="Default select example">
                            <option selected disabled value="{{ $expediente->region->id }}">
                                {{ $expediente->region->nombre }}</option>
                            @foreach ($regiones as $region)
                                <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
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
                <div class="col-md-6">
                        Petición
                    <div class="form-floathing">
                        <select name="peticion_id" class="form-select" aria-label="Default select example">
                            <option selected disabled value="{{ $expediente->peticion->id }}">
                                {{ $expediente->peticion->lugar }}</option>
                            @foreach ($peticiones as $peticion)
                                <option value="{{ $peticion->id }}">{{ $peticion->lugar }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="date" value="{{ $expediente->fecha }}" name="fecha" class="form-control"
                            id="floatingName" placeholder="Ingresar fecha">
                        @error('fecha')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">Fecha</label>
                    </div>
                </div>
                <div class="col-md-6">
                    Actor
                    <div class="form-floathing">
                        <select name="actor_id" class="form-select" aria-label="Default select example">
                            <option selected disabled value="{{ $expediente->actor->id }}">
                                {{ $expediente->actor->nombre }}</option>
                            @foreach ($actores as $actor)
                                <option value="{{ $actor->id }}">{{ $actor->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    Dependencia
                    <div class="form-floathing">
                        <select name="dependencia_id" class="form-select" aria-label="Default select example">
                            <option selected disabled value="{{ $expediente->dependencia->id }}">
                                {{ $expediente->dependencia->nombre }}</option>
                            @foreach ($dependencias as $dependencia)
                                <option value="{{ $dependencia->id }}">{{ $dependencia->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    Estatus
                    <div class="form-floathing">
                        <select name="estatus_id" class="form-select" aria-label="Default select example">
                            <option selected disabled value="{{ $expediente->estatus->id }}">
                                {{ $expediente->estatus->nombre }}</option>
                            @foreach ($estatus as $estatus)
                                <option value="{{ $estatus->id }}">{{ $estatus->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    Tramite
                    <div class="form-floathing">
                        <select name="tramite_id" class="form-select" aria-label="Default select example">
                            <option selected disabled value="{{ $expediente->tramite->id }}">
                                {{ $expediente->tramite->nombre }}</option>
                            @foreach ($tramites as $tramite)
                                <option value="{{ $tramite->id }}">{{ $tramite->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" value="{{ $expediente->comentario }}" name="comentarios"
                            class="form-control" id="floatingName" placeholder="Ingresar comentario">
                        @error('Comentario')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">Comentario</label>
                    </div>
                </div>
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
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="date" value="{{ $expediente->fecha1 }}" name="fecha1" class="form-control"
                            id="floatingName" placeholder="Ingresar fecha1">
                        @error('fecha1')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">fecha1</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="date" value="{{ $expediente->fecha2 }}" name="fecha2" class="form-control"
                            id="floatingName" placeholder="Ingresar fecha2">
                        @error('fecha2')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">fecha2</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="date" value="{{ $expediente->fecha3 }}" name="fecha3" class="form-control"
                            id="floatingName" placeholder="Ingresar fecha3">
                        @error('fecha3')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">fecha3</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="date" value="{{ $expediente->fecha4 }}" name="fecha4" class="form-control"
                            id="floatingName" placeholder="Ingresar fecha4">
                        @error('fecha4')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">fecha4</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="date" value="{{ $expediente->fecha5 }}" name="fecha5" class="form-control"
                            id="floatingName" placeholder="Ingresar fecha5">
                        @error('fecha5')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">fecha5</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="date" value="{{ $expediente->fecha6 }}" name="fecha6" class="form-control"
                            id="floatingName" placeholder="Ingresar fecha6">
                        @error('fecha6')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">fecha6</label>
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
                        <input type="submit" name="submit" class="btn btn-primary" value="Cargar Archivo">
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

@endsection
