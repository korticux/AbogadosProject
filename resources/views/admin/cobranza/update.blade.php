@extends('admin.admin_master')


@section('admin')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Actualizar Cobranza</h5>

            <!-- Default Tabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                        role="tab" aria-controls="home" aria-selected="true">Proceso Inicial</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                        role="tab" aria-controls="profile" aria-selected="false">Subida De Archivos</button>
                </li>
            </ul>

            <div class="tab-content pt-2" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <!-- Floating Labels Form -->
                    <form class="row g-3" method="POST" action="{{ route('cobranza.update', $cobranza->id) }}">
                        @csrf
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" value="{{ $cobranza->cobranza }}" name="cobranza"
                                    class="form-control" id="floatingName" placeholder="Ingresar cobranza">
                                @error('cobranza')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                                <label for="cobranza">Cobranza</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" name="tipo" value="{{ $cobranza->tipo }}" class="form-control"
                                    id="floatingName" placeholder="Ingresar tipo">
                                @error('tipo')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                                <label for="tipo">Tipo</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floathing">
                                <select name="cuenta_id" class="form-select" aria-label="Default select example">
                                    <option selected disabled>{{ $cobranza->cuenta->cuenta }}</option>
                                    @foreach ($cuentas as $cuenta)
                                        <option value="{{ $cuenta->id }}">{{ $cuenta->cuenta }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" value="{{ $cobranza->referencia }}" name="referencia"
                                    class="form-control" id="floatingName" placeholder="Ingresar referencia">
                                @error('referencia')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                                <label for="referencia">Referencia</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" name="monto" value="{{ $cobranza->monto }}" class="form-control"
                                    id="floatingName" placeholder="Ingresar monto">
                                @error('monto')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                                <label for="monto">Monto</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floathing">
                                <label for="fecha">Fecha</label>
                                <input type="date" value="{{ $cobranza->fecha }}" class="form-control" name="fecha">
                                @error('fecha')
                                    <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('cobranza.index') }}" type="reset" class="btn btn-secondary">Regresar</a>
                        </div>
                    </form><!-- End floating Labels Form -->

                </div>


                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="col-md-12">
                        <div class="border p-3 rounded">
                            <h6 class="mb-0 text-uppercase">Carga de Archivos De Cobranza<br><br><b>Archivos Soportados:
                                    .pdf,
                                    .xls, .xlsx, .doc, .docx, .png, .jpg, .jpeg, .bmp, .ppt, .pptx</b></h6>
                            <hr>
                            <div class="col-6">
                                <label class="form-label">Título del Archivo:</label>
                                <input type="text" name="nombre_earchivos" class="form-control" autocomplete="off"
                                    required="">
                            </div>
                            <br>
                            <div class="col-6">
                                <input type="file" name="archivo_earchivos"
                                    accept=".pdf, .xls, .xlsx, .doc, .docx, .png, .jpeg, .bmp, .jpg, .ppt, .pptx"
                                    required="">
                            </div>
                            <br>
                            <div class="col-6">
                                <input type="submit" name="submit" class="btn btn-primary" value="Cargar Archivo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
