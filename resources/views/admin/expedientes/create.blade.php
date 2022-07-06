@extends('admin.admin_master')


@section('admin')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Crear Expediente</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" method="POST" action="{{ route('expedientes.store') }}">
                @csrf
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" name="numero" class="form-control" id="floatingName"
                            placeholder="Ingresar numero">
                        @error('numero')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="numero">Numero del expediente</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" name="ano" class="form-control" id="floatingName"
                            placeholder="Ingresar ano">
                        @error('ano')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">Año</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floathing">
                        <select name="region_id" class="form-select" aria-label="Default select example">
                            <option selected disabled>Selecciona Una Region</option>
                            @foreach ($regiones as $region)
                                <option value="{{ $region->id }}">{{ $region->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" name="sala" class="form-control" id="floatingName"
                            placeholder="Ingresar sala">
                        @error('sala')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">Sala</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" name="ponencia" class="form-control" id="floatingName"
                            placeholder="Ingresar ponencia">
                        @error('ponencia')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">Ponencia</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floathing">
                        <select name="peticion_id" class="form-select" aria-label="Default select example">
                            <option selected disabled>Selecciona Una Peticion</option>
                            @foreach ($peticiones as $peticion)
                                <option value="{{ $peticion->id }}">{{ $peticion->lugar }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="date" name="fecha" class="form-control" id="floatingName"
                            placeholder="Ingresar fecha">
                        @error('fecha')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">Fecha</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floathing">
                        <select name="actor_id" class="form-select" aria-label="Default select example">
                            <option selected disabled>Selecciona Un Actor</option>
                            @foreach ($actores as $actor)
                                <option value="{{ $actor->id }}">{{ $actor->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floathing">
                        <select name="dependencia_id" class="form-select" aria-label="Default select example">
                            <option selected disabled>Selecciona Una Dependencia</option>
                            @foreach ($dependencias as $dependencia)
                                <option value="{{ $dependencia->id }}">{{ $dependencia->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floathing">
                        <select name="estatus_id" class="form-select" aria-label="Default select example">
                            <option selected disabled>Selecciona Un Estatus</option>
                            @foreach ($estatus as $estatus)
                                <option value="{{ $estatus->id }}">{{ $estatus->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floathing">
                        <select name="tramite_id" class="form-select" aria-label="Default select example">
                            <option selected disabled>Selecciona Un Tramite</option>
                            @foreach ($tramites as $tramite)
                                <option value="{{ $tramite->id }}">{{ $tramite->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" name="comentarios" class="form-control" id="floatingName"
                            placeholder="Ingresar comentario">
                        @error('Comentario')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">Comentario</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" name="honorario" class="form-control" id="floatingName"
                            placeholder="Ingresar honorario">
                        @error('honorario')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">Honorario</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" name="pagoinicial" class="form-control" id="floatingName"
                            placeholder="Ingresar pago inicial">
                        @error('pago inicial')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">Pago Inicial</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="date" name="fecha1" class="form-control" id="floatingName"
                            placeholder="Ingresar fecha1">
                        @error('fecha1')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">fecha1</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="date" name="fecha2" class="form-control" id="floatingName"
                            placeholder="Ingresar fecha2">
                        @error('fecha2')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">fecha2</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="date" name="fecha3" class="form-control" id="floatingName"
                            placeholder="Ingresar fecha3">
                        @error('fecha3')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">fecha3</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="date" name="fecha4" class="form-control" id="floatingName"
                            placeholder="Ingresar fecha4">
                        @error('fecha4')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">fecha4</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="date" name="fecha5" class="form-control" id="floatingName"
                            placeholder="Ingresar fecha5">
                        @error('fecha5')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">fecha5</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="date" name="fecha6" class="form-control" id="floatingName"
                            placeholder="Ingresar fecha6">
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
    </div>
@endsection
