@extends('admin.admin_master')

@section('admin')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Crear Actores</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" method="POST" action="{{ route('actores.store') }}">
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
                        <input type="datetime" name="nacimiento" class="form-control" id="floatingName"
                            placeholder="Ingresar Fecha De Nacimiento">
                        <label for="Nombre">Fecha De Nacimiento</label>
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
                <div class="col-md-12">
                    <div class="form-floating">
                        <textarea name="domicilio" id="" cols="30" rows="10" class="form-control" id="floatingName"></textarea>
                        <label for="Nombre">Domicilio</label>
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
