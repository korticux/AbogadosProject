@extends('admin.admin_master')


@section('admin')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Crear Cobranza</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" method="POST" action="{{ route('cobranza.update', $cobranza->id) }}">
                @csrf
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" value="{{$cobranza->cobranza}}" name="cobranza" class="form-control" id="floatingName"
                            placeholder="Ingresar cobranza">
                        @error('cobranza')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="cobranza">Cobranza</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" name="tipo" value="{{$cobranza->tipo}}" class="form-control" id="floatingName"
                            placeholder="Ingresar tipo">
                        @error('tipo')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="tipo">Tipo</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floathing">
                        <select name="cuenta_id" class="form-select" aria-label="Default select example">
                            <option selected disabled>Selecciona una cuenta</option>
                            @foreach ($cuentas as $cuenta)
                                <option value="{{ $cuenta->id }}">{{ $cuenta->cuenta }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" value="{{$cobranza->referencia}}" name="referencia" class="form-control" id="floatingName"
                            placeholder="Ingresar referencia">
                        @error('referencia')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="referencia">Referencia</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floathing">
                        <label for="fecha">Fecha</label>
                        <input type="date" value="{{$cobranza->fecha}}" class="form-control" name="fecha">
                        @error('fecha')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating">
                        <input type="text" name="monto" value="{{$cobranza->monto}}" class="form-control" id="floatingName"
                            placeholder="Ingresar monto">
                        @error('monto')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="monto">Monto</label>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('cobranza.index') }}" type="reset" class="btn btn-secondary">Regresar</a>
                </div>
            </form><!-- End floating Labels Form -->

        </div>
    </div>
@endsection
