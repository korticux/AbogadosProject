@extends('admin.admin_master')


@section('admin')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Crear Peticion</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" method="POST" action="{{ route('peticiones.update',$peticion->id) }}">
                @csrf
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" name="lugar" value='{{$peticion->lugar}}' class="form-control" id="floatingName"
                            placeholder="Ingresar nombre">
                        @error('lugar')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="lugar">Nombre de la peticion</label>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('peticiones.index') }}" type="reset" class="btn btn-secondary">Regresar</a>
                </div>
            </form><!-- End floating Labels Form -->

        </div>
    </div>
@endsection
