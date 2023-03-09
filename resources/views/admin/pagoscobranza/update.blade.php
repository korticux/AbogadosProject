@extends('admin.admin_master')


@section('admin')
    @php
        use App\Models\Cuentas;
        $cuentas = Cuentas::latest()->get();
    @endphp
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Actualizar Pago</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" method="POST" action="{{ route('pagoscobranza.update', $pagoscobranzas->id) }}"
                enctype="multipart/form-data">
                @csrf

                <div class="col-md-9">


                    <div class="form-floathing my-4">

                        <select name="cuentas_id" class="form-select" aria-label="Default select example">
                            <option value="{{ $cobranza->cuenta->id ?? '' }}">Selecciona una cuenta</option>
                            @foreach ($cuentas as $cuenta)
                                <option value="{{ $cuenta->id }}">{{ $cuenta->banco }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-floathing">
                        <label for="fecha_pago">Fecha de pago</label>
                        <input value="{{ $pagoscobranzas->fecha_pago }}" type="date" class="form-control"
                            name="fecha_pago">
                    </div>
                    <br>
                </div>


                

                <div class="col-md-4">
                    <div class="form-floating ">
                        <input value="{{$pagoscobranzas->monto}}" type="number" name="monto"
                            class="form-control" id="floatingName" placeholder="Ingresar monto numerico ">
                        @error('monto')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="monto">Monto</label>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-floating ">
                        <input value="{{ $pagoscobranzas->tipo_pago }}" type="text" name="tipo_pago" class="form-control"
                            id="floatingName" placeholder="Ingresar tipo">
                        @error('tipo')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="tipo">Tipo de pago</label>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-floating ">
                        <input value="{{ $pagoscobranzas->referencia }}" type="text" name="referencia"
                            class="form-control" id="floatingName" placeholder="Ingresar referencia">
                        @error('referencia')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="referencia">Referencia</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floathing">
                        <label for="comentario">Comentarios</label>
                        <textarea name="comentario" class="form-control" cols="10" rows="2">{{ $pagoscobranzas->comentario }}</textarea>
                    </div>
                    <br>
                </div>



                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('cobranza.index') }}" type="reset" class="btn btn-secondary">Regresar</a>
                </div>
            </form><!-- End floating Labels Form -->
        </div>
    </div>
@endsection
