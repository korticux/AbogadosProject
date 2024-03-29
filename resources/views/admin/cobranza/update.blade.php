@extends('admin.admin_master')


@section('admin')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Actualizar Cobranza</h5>

            <!-- Default Tabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                        role="tab" aria-controls="home" aria-selected="true">Cobranzas</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                        role="tab" aria-controls="profile" aria-selected="false">Archivos De Cobranza</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="payment-tab" data-bs-toggle="tab" data-bs-target="#payment" type="button"
                        role="tab" aria-controls="payment" aria-selected="false">Pagos De Cobranza</button>
                </li>
            </ul>

            <div class="tab-content pt-3" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <!-- Floating Labels Form -->
                    <form class="row g-3" method="POST" action="{{ route('cobranza.update', $cobranza->id) }}" enctype="multipart/form-data">
                        @csrf
                        {{-- <div class="col-md-6">
                            <div class="form-floathing my-3">
                        <label class="col-sm-4 col-form-label">Cuenta actual: <b>
                            {{ $cobranza->cuenta->banco ?? 'Ninguno'}}</b></label>
                                <select name="cuenta_id"  class="form-select" aria-label="Default select example">
                                    <option value="{{$cobranza->cuenta->id ?? ''}}">Selecciona una cuenta</option>
                                    @foreach ($cuentas as $cuenta)
                                        <option value="{{ $cuenta->id }}">{{ $cuenta->banco }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        <div class="col-md-8">
                            <div class="form-floathing my-3">
                        <label class="col-sm-4 col-form-label">Actor actual: <b>
                            {{ $cobranza->actor->nombre ?? 'Ninguno'}}</b></label>
                                <select name="actor_id" class="form-select" aria-label="Default select example">
                                    <option value="{{$cobranza->actor->id ?? ''}}">Selecciona una actor</option>
                                    @foreach ($actores as $actor)
                                        <option value="{{ $actor->id }}">{{ $actor->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <br>
                            <div class="form-floating my-3">
                                <input type="text" value={{$cobranza->cobranza}}  name="cobranza" class="form-control" id="floatingName"
                                    placeholder="Ingresar cobranza">
                                @error('cobranza')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                                <label for="cobranza">Nombre cobranza</label>
                            </div>
                        </div>
                        {{-- <div class="col-md-4">
                            <div class="form-floating my-3">
                                <input type="text" value={{$cobranza->tipo}} name="tipo" class="form-control" id="floatingName"
                                    placeholder="Ingresar tipo">
                                @error('tipo')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                                <label for="tipo">Tipo</label>
                            </div>
                        </div> --}}

                        {{-- <div class="col-md-4">
                            <div class="form-floating my-3">
                                <input type="text"  value={{$cobranza->referencia}} name="referencia" class="form-control" id="floatingName"
                                    placeholder="Ingresar referencia">
                                @error('referencia')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                                <label for="referencia">Referencia</label>
                            </div>
                        </div> --}}
                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <input type="number"  value={{$cobranza->total}} name="total" class="form-control" id="floatingName"
                                    placeholder="Ingresar total">
                                @error('total')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                                <label for="total">Total</label>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <input type="number" disabled value={{$cobranza->monto_percibido}} name="monto_percibido" class="form-control" id="floatingName"
                                    placeholder="Ingresar monto percibido">
                                @error('monto_percibido')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                                <label for="monto_percibido">Monto abonado</label>
                            </div>
                        </div>

                        @php
                            $dif = $cobranza->total - $cobranza->monto_percibido;
                        @endphp

                        <div class="col-md-4">
                            <div class="form-floating my-3">
                                <input type="number" disabled value={{$dif}} class="form-control" id="floatingName"
                                    placeholder="Ingresar monto percibido">
                                @error('monto_percibido')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                                <label for="monto_percibido">Monto pendiente</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floathing my-3">
                                <label for="fecha" >Fecha</label>
                                <input type="date" value="{{$cobranza->fecha}}" class="form-control" name="fecha">
                                @error('fecha')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-floathing">
                                <label for="comentario">Comentarios</label>
                                <textarea name="comentario" class="form-control" cols="10" rows="2">{{$cobranza->comentario}}</textarea>
                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="form-floathing">
                                <label for="nombre_archivo">Documentación de Cobranza</label>
                                <input type="file" name="nombre_archivo[]" class="form-control" multiple>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('cobranza.index') }}" type="reset" class="btn btn-secondary">Regresar</a>
                        </div>
                    </form><!-- End floating Labels Form -->

                </div>


                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                     {{-- Aqui empiza el segundo tab --}}
                    <!-- Floating Labels Form -->
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Num. Archivo</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Cobranza</th>
                                <th scope="col">Fecha Creacion</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($archivos_cobranzas as $archivos_cobranza)
                          
                                <tr>
                                    <th>{{ $archivos_cobranza->id }}</th>
                                    <th>{{ $archivos_cobranza->nombre_archivo }}</th>
                                    <th>{{ $archivos_cobranza->cobranza_id }}</th>
                                    <th>{{ $archivos_cobranza->created_at }}</th>

                                    

                                    <th class="row">
                                        <div class="btn-group" role="group" aria-label="Basic example">

                                            <a class="btn btn-sm btn-outline-dark" id="download"
                                            href="{{ url('cobranza/download', $archivos_cobranza->id) }}"><i
                                                class="bi bi-eye-fill"></i></a>

                                            @can('actores-delete')
                                                <a class="btn btn-sm btn-outline-dark" id="delete"
                                                href="{{ url('archivoscobranza/delete/' . $archivos_cobranza->id ."/" . $cobranza->id) }}"><i
                                                        class="bi bi-trash-fill"></i></a>
                                            @endcan
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End floating Labels Form -->
                </div>
                <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                    {{-- Aqui empieza la tercera tab --}}
                   <!-- Floating Labels Form -->

                   <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">

                                <h5 class="card-title">Pagos Cobranza</h5>

                                @php
                                        $i = 1;
                                        if($cobranza->monto_percibido >= $cobranza->total){
                                            $rt = route('cobranza.edit', $cobranza->id);
                                            $bt = 'btn-secondary';

                                        }elseif($cobranza->monto_percbidio < $cobranza->total){
                                            $rt = route('pagoscobranza.post');
                                            $bt = 'btn-primary';
                                        }


                                @endphp

                                @can('cobranza-create')

                                    <a class="btn {{$bt}}" href="{{ $rt }}"> <i class="bi bi-plus-circle"></i> &nbsp;
                                        Agregar
                                        Pago </a>
                                @endcan

                                {{-- <a href="{{ route('cobranza.export') }}" class="btn btn-secondary"> <i
                                        class="bi bi-file-earmark-excel-fill"></i> &nbsp; Excel</a>

                                <a href="{{ URL::to('/cobranza/createPDF') }}" class="btn btn-secondary"> <i
                                        class="bi bi-file-earmark-pdf"></i> &nbsp; PDF</a> --}}

                                <!-- Table with stripped rows -->
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Num. Pago</th>

                                            <th scope="col">Cuenta</th>
                                            <th scope="col">Monto</th>
                                            <th scope="col">Fecha de pago</th>
                                            <th scope="col">Acciones</th>

                                        </tr>
                                    </thead>
@php
    use App\Models\Cuentas;
@endphp

                                    <tbody>
                                        @foreach ($pagoscobranzas as $pagoscobranza)
                                            @php
                                                $bank = Cuentas::where('id', '=', $pagoscobranza->cuentas_id)->get();
                                            @endphp
                                            <tr>
                                                <th>{{ $i++; }}</th>

                                                <th>{{ $bank[0]->banco ?? ''}}</th>
                                                <th>{{"$ " .number_format($pagoscobranza->monto, 2) }}</th>
                                                <th>{{ $pagoscobranza->fecha_pago }}</th>
                                                <th class="row">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                            <a class="btn  btn-sm btn-outline-dark"
                                                                href="{{ route('pagoscobranza.edit', $pagoscobranza->id) }}"><i
                                                                    class="bi bi-eye-fill"></i></a>

                                                            <a class="btn btn-sm btn-outline-dark" id="delete"
                                                                href="{{ route('pagoscobranza.delete', $pagoscobranza->id) }}"><i
                                                                    class="bi bi-trash-fill"></i></a>

                                                    </div>
                                                </th>
                                            </tr>
                                            @php
                                            $mt = DB::table('pagos_cobranzas')->where('cobranza_id', '=', $pagoscobranza->id)->get();
                                            $mtt = $mt->sum('monto');
                                            if($mtt > 0){
                                                DB::table("cobranzas")->update([
                                                    'monto_percibido' => $mtt,
                                                ]);
                                            }elseif($mtt == 0){

                                            }
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->

                            </div>
                        </div>

                    </div>
                </div>
                   <!-- End floating Labels Form -->
               </div>
            </div>
        @endsection
