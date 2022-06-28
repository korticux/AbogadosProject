@extends('admin.admin_master')


@section('admin')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Crear Festivos</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" method="POST" action="{{ route('festivos.update', $festivo->id) }}">
                @csrf
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" name="nombre" value="{{$festivo->nombre}}" class="form-control" id="floatingName"
                            placeholder="Ingresar nombre">
                        @error('nombre')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">Nombre del festivo</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floathing">
                        <label for="fecha">Fecha</label>
                        <input type="date" value="{{$festivo->fecha}}" class="form-control" name="fecha">
                        @error('fecha')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('festivos.index') }}" type="reset" class="btn btn-secondary">Regresar</a>
                </div>
            </form><!-- End floating Labels Form -->

        </div>
    </div>
@endsection
