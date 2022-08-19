@extends('admin.admin_master')


@section('admin')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Actualizar Pago</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" method="POST" action="{{ route('pagoscobranza.update', $pagoscobranzas->id ) }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <div class="form-floathing my-3">
                        <select name="cobranza_id" class="form-select" aria-label="Default select example">
                            <option value="">Seleccionar el id del actor </option>
                            @foreach ($cobranzas as $cobranza)
                                <option value="{{ $cobranza->id }}">{{ $cobranza->actor->nombre ?? '' }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-floating my-3">
                        <input type="text" value={{$pagoscobranzas->nombre_pagos}} name="nombre_pagos" class="form-control" id="floatingName"
                            placeholder="Ingresar nombre del pago ">
                        @error('nombre_pagos')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre_pagos">Nombre del pago </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating my-3">
                        <input type="number" value={{$pagoscobranzas->monto}} name="monto" class="form-control" id="floatingName"
                            placeholder="Ingresar monto numerico ">
                        @error('monto')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="monto">Monto</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floathing">
                        <label for="comentario">Comentarios</label>
                        <textarea name="comentario" class="form-control" cols="10" rows="2">{{$pagoscobranzas->comentario}}</textarea>
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
