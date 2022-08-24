@extends('admin.admin_master')


@section('admin')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Crear Proceso</h5>

            <!-- Floating Labels Form -->
            <form class="row g-12" method="POST" action="{{ route('proceso.store') }}">
                @csrf
                <div class="col-md-12">
                    <div class="form-floathing my-3">
                        <select name="expedientes_id" class="form-select" aria-label="Default select example">
                            <option value="{{$expediente->numero_exp ?? ''}}">Selecciona un expediente</option>
                            @foreach ($expedientes as $expediente)
                            @php
                                if (empty($expediente->region->numero))
                                $rn = "";
                                elseif ($expediente->region->numero != null)
                                $rn = $expediente->region->numero;
                            @endphp
                                <option value="{{$expediente->id}}">{{$expediente->numero . " / " . $expediente->ano . " - " . $rn . " - " . $expediente->sala . " - " . $expediente->ponencia}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating my-3">
                        <input type="text" name="numero_de_oficio" class="form-control" id="floatingName"
                            placeholder="Ingresar numero_de_oficio">
                        @error('numero_de_oficio')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">Numero De Oficio</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating my-3">
                        <input type="date" name="fecha_de_ingreso" class="form-control" id="floatingName"
                            placeholder="Ingresar fecha_de_ingreso">
                        @error('fecha_de_ingreso')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">Fecha de Ingreso</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating my-3">
                        <input type="date" name="fecha_cedula_notificacion" class="form-control" id="floatingName"
                            placeholder="Ingresar fecha_cedula_notificacion">
                        @error('fecha_cedula_notificacion')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">Fecha Cedula Notificacion</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating my-3">
                        <input type="date" name="fecha_oficio" class="form-control" id="floatingName"
                            placeholder="Ingresar fecha_oficio">
                        @error('fecha_oficio')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">Fecha De Oficio</label>
                    </div>
                </div>
                <div class="col-md-6 my-3">
                    <div class="form-floating">
                        <input type="date" name="fecha_notificacion_admision" class="form-control" id="floatingName"
                            placeholder="Ingresar fecha_notificacion_admision">
                        @error('fecha_notificacion_admision')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">Fecha Notificacion Admision</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating my-3">
                        <input type="text" name="quien_recibio" class="form-control" id="floatingName"
                            placeholder="Ingresar quien_recibio">
                        @error('quien_recibio')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">Quien Recibio</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating my-3">
                        <input type="text" name="numero_guia" class="form-control" id="floatingName"
                            placeholder="Ingresar numero_guia">
                        @error('numero_guia')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">Numero De Guia</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating my-3">
                        <input type="date" name="negativa_ficha" class="form-control" id="floatingName"
                            placeholder="Ingresar negativa_ficha">
                        @error('negativa_ficha')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">Negativa Ficha</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating my-3">
                        <input type="date" name="documento_impugnado_original" class="form-control" id="floatingName"
                            placeholder="Ingresar documento_impugnado_original">
                        @error('documento_impugnado_original')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">Documento Impugnado Original</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating my-3">
                        <input type="date" name="fecha_demanda" class="form-control" id="floatingName"
                            placeholder="Ingresar fecha_demanda">
                        @error('fecha_demanda')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">Fecha De Demanda</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floathing">
                        <label for="comentario1">Comentarios</label>
                        <textarea name="comentario1" class="form-control" cols="10" rows="2"></textarea>
                    </div>
                    <br>
                </div>
                <hr>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('proceso.index') }}" type="reset" class="btn btn-secondary">Regresar</a>
                </div>
            </form><!-- End floating Labels Form -->

        </div>
    </div>
@endsection
