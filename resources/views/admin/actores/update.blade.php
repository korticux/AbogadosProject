@extends('admin.admin_master')

@section('admin')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Actualizar Actor</h5>


            <!-- TABS -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                        role="tab" aria-controls="home" aria-selected="true">Actores</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                        role="tab" aria-controls="profile" aria-selected="false">Archivos De Actores</button>
                </li>
            </ul>

            <div class="tab-content pt-2" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                    <!-- Floating Labels Form -->
                    <form class="row g-3" method="POST" action="{{ route('actores.update', $actor->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" value="{{ $actor->nombre }}" name="nombre" class="form-control"
                                    id="floatingName" placeholder="Ingresar Nombre">
                                <label for="Nombre">Nombre del Actor</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" value="{{ $actor->curp }}" name="curp" class="form-control"
                                    id="floatingName" placeholder="Capturar Curp">
                                <label for="Nombre">Curp</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="email" value="{{ $actor->correo }}" name="correo" class="form-control"
                                    id="floatingName" placeholder="Ingresar Correo">
                                <label for="Nombre">Correo</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" value="{{ $actor->telefono }}" name="telefono" class="form-control"
                                    id="floatingName" placeholder="Ingresar Telefono">
                                <label for="Nombre">Telefono</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" value="{{ $actor->nocliente }}" name="nocliente" class="form-control"
                                    id="floatingName" placeholder="Ingresar # De Cliente">
                                <label for="Nombre"># De Cliente</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" value="{{ $actor->rfc }}" name="rfc" class="form-control"
                                    id="floatingName" placeholder="Ingresar RFC">
                                <label for="Nombre">RFC</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" value="{{ $actor->honorario }}" name="honorario" class="form-control"
                                    id="floatingName" placeholder="Ingresar Honorario">
                                <label for="honorario">Honorario</label>
                                @error('honorario')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">

                            <div class="form-floating">

                                <select name="tipodemanda" class="form-select" aria-label="Default select example">
                                    <option value="{{ $actor->tipodemanda ?? '' }}">Selecciona el tipo</option>
                                    @foreach ($tramites as $tramite)
                                        <option value="{{ $tramite->nombre }}">{{ $tramite->nombre }}</option>
                                    @endforeach
                                </select>
                                <label>El tipo es: <b>{{ $actor->tipodemanda ?? '' }}</b></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floathing">
                                <label>Dependencia actual: <b>{{ $actor->dependencia->nombre ?? 'Ninguno' }}</b></label>
                                <select name="dependencia_id" class="form-select" aria-label="Default select example">
                                    <option value="{{ $actor->dependencia->id ?? '' }}">Selecciona una dependencia
                                    </option>
                                    @foreach ($dependencias as $dependencia)
                                        <option value="{{ $dependencia->id }}">{{ $dependencia->nombre }}</option>
                                    @endforeach
                                    <option value="">Ninguno</option>
                                </select>
                            </div>
                        </div>
                        @php
                            use App\Models\Actores;
                            $actor = Actores::findOrFail($id);
                            $i = 1;
                        @endphp
                        <div class="col-md-6">
                            <div class="form-floathing">
                                <label>Estado actual: <b>{{ $actor->estado->Nombre ?? 'Ninguno' }}</b></label>
                                <select name="estado_id" class="form-select" aria-label="Default select example">
                                    <option value="{{ $actor->estado->id ?? '' }}">Selecciona un estado</option>
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado->id }}">{{ $estado->Nombre }}</option>
                                    @endforeach
                                    <option value="">Ninguno</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" value="{{ $actor->domicilio }}" name="domicilio"
                                    class="form-control" id="floatingName" placeholder="Ingresar Domicilio">
                                <label for="Nombre">Domicilio</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" value="{{ $actor->ciudad }}" name="ciudad" class="form-control"
                                    id="floatingName" placeholder="Ingresar Ciudad">
                                <label for="Nombre">Ciudad</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floathing">
                                <label for="nacimiento">Nacimiento</label>
                                <input type="date" class="form-control" value="{{ $actor->nacimiento }}"
                                    name="nacimiento">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floathing">
                                <label for="fecha1">Fecha de peticion</label>
                                <input type="date" class="form-control" value="{{ $actor->fecha1 }}" name="fecha1">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floathing">
                                <label for="comentarios">Comentarios</label>
                                <textarea name="comentarios" class="form-control" cols="10" rows="2">
                            {{ $actor->comentarios }}
                        </textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floathing">
                                <input type="file" name="nombre_archivo[]" class="form-control">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('actores.index') }}" type="reset" class="btn btn-secondary">Regresar</a>
                        </div>
                    </form>
                </div>
                <!-- End floating Labels Form -->

                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                    {{-- Aqui empiza el segundo tab --}}
                    <!-- Floating Labels Form -->
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Num. Archivo</th>
                                <th scope="col">nombre</th>
                                <th scope="col">Actor Id</th>
                                <th scope="col">Fecha Creacion</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($archivos_actores as $archivos_actor)
                                <tr>
                                    <th>{{ $i++ }}</th>
                                    <th>{{ $archivos_actor->nombre_archivo }}</th>
                                    <th>{{ $archivos_actor->actor_id }}</th>
                                    <th>{{ $archivos_actor->created_at }}</th>

                                    <th class="row">
                                        <div class="btn-group" role="group" aria-label="Basic example">

                                            <a class="btn btn-sm btn-outline-dark" id="download"
                                            href="{{ url('actores/download', $archivos_actor->id) }}"><i
                                                class="bi bi-eye-fill"></i></a>


                                            @can('actores-delete')
                                                <a class="btn btn-sm btn-outline-dark" id="delete"
                                                    href="{{ url('archivosactores/delete/' . $archivos_actor->id . '/' . $actor->id) }}"><i
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
            </div>
        </div>
    @endsection
