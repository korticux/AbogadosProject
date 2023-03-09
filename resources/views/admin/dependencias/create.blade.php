@extends('admin.admin_master')


@section('admin')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Crear Dependencia</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" method="POST" action="{{ route('dependencias.store') }}">
                @csrf
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" name="nombre" class="form-control" id="floatingName"
                            placeholder="Ingresar nombre">
                        @error('nombre')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">Nombre de la Dependencia</label>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('dependencias.index') }}" type="reset" class="btn btn-secondary">Regresar</a>
                </div>
            </form><!-- End floating Labels Form -->

        </div>
    </div>
@endsection
