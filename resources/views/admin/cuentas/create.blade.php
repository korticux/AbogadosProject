@extends('admin.admin_master')


@section('admin')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Crear Cuentas</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" method="POST" action="{{ route('cuentas.store') }}">
                @csrf
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" name="banco" class="form-control" id="floatingName"
                            placeholder="Ingresar banco">
                        @error('banco')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">Banco de la cuenta</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" name="cuenta" class="form-control" id="floatingName"
                            placeholder="Ingresar cuenta">
                        @error('cuenta')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">Cuenta</label>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('cuentas.index') }}" type="reset" class="btn btn-secondary">Regresar</a>
                </div>
            </form><!-- End floating Labels Form -->

        </div>
    </div>
@endsection
