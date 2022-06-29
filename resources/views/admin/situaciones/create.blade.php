@extends('admin.admin_master')


@section('admin')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Crear Pais</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" method="POST" action="{{ route('situaciones.store') }}">
                @csrf
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" name="expediente" class="form-control" id="floatingName"
                            placeholder="Ingresar Expediente">
                        @error('expediente')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="expediente">Nombre del expediente</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" name="situacion" class="form-control" id="floatingName"
                            placeholder="Ingresar Situacion">
                        @error('situacion')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="situacion">Situacion</label>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="date" name="fecha" class="form-control" id="floatingName"
                            placeholder="Ingresar Fecha">
                        @error('fecha')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="fecha">Fecha</label>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-floating">
                            <textarea name="" id="" cols="10" rows="10" name="comentario" class="form-control" id="floatingName"
                            placeholder="Ingresar comentario"></textarea>
                        @error('comentario')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="comentario">Comentario</label>
                    </div>
                </div>


                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('paises.index') }}" type="reset" class="btn btn-secondary">Regresar</a>
                </div>
            </form><!-- End floating Labels Form -->

        </div>
    </div>
@endsection
