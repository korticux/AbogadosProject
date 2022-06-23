@extends('admin.admin_master')


@section('admin')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Crear Estado</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" method="POST" action="{{ route('estados.store') }}">
                @csrf
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" name="Nombre" class="form-control" id="floatingName"
                            placeholder="Ingresar Nombre">
                        <label for="Nombre">Nombre del Estado</label>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('estados.index') }}" type="reset" class="btn btn-secondary">Regresar</a>
                </div>
            </form><!-- End floating Labels Form -->

        </div>
    </div>
@endsection
