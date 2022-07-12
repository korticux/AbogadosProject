@extends('admin.admin_master')

@section('admin')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Crear Actores</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" method="POST" action="{{ route('actores.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" name="nombre" class="form-control" id="floatingName"
                            placeholder="Ingresar Nombre">
                        <label for="Nombre">Nombre del Actor</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" name="curp" class="form-control" id="floatingName"
                            placeholder="Capturar Curp">
                        <label for="Nombre">Curp</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="email" name="correo" class="form-control" id="floatingName"
                            placeholder="Ingresar Correo">
                        <label for="Nombre">Correo</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" name="telefono" class="form-control" id="floatingName"
                            placeholder="Ingresar Telefono">
                        <label for="Nombre">Telefono</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" name="nocliente" class="form-control" id="floatingName"
                            placeholder="Ingresar # De Cliente">
                        <label for="Nombre"># De Cliente</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" name="rfc" class="form-control" id="floatingName"
                            placeholder="Ingresar RFC">
                        <label for="Nombre">RFC</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" name="domicilio" class="form-control" id="floatingName"
                            placeholder="Ingresar Domicilio">
                        <label for="Nombre">Domicilio</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floathing">
                        <select name="estado_id" class="form-select" aria-label="Default select example">
                            <option selected disabled>Selecciona Un Estado</option>
                            @foreach ($estados as $estado)
                                <option value="{{ $estado->id }}">{{ $estado->Nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" name="ciudad" class="form-control" id="floatingName"
                            placeholder="Ingresar Ciudad">
                        <label for="Nombre">Ciudad</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floathing">
                        <label for="nacimiento">Nacimiento</label>
                        <input type="date" class="form-control" name="nacimiento">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floathing">
                        <label for="nacimiento">Comentarios</label>
                        <textarea name="comentarios" class="form-control" cols="10" rows="2"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floathing">
                        <label for="nombre_archivo">Documentación de Actores</label>
                        <input type="file" name="nombre_archivo[]" class="form-control" multiple>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('actores.index') }}" type="reset" class="btn btn-secondary">Regresar</a>
                </div>
            </form><!-- End floating Labels Form -->

        </div>
    </div>
@endsection
