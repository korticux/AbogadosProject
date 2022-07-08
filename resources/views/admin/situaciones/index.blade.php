@extends('admin.admin_master')

@section('admin')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">• Situaciones</h5>
                    <a class="btn btn-primary" href="{{ route('situaciones.post') }}"> <i class="bi bi-plus-circle"></i>
                        &nbsp;
                        Agregar
                        Situacion</a>

                    <a href="{{ route('situaciones.export') }}" class="btn btn-secondary"> <i
                            class="bi bi-file-earmark-excel-fill"></i> &nbsp; Excel</a>

                            <a href="{{ URL::to('/situaciones/createPDF') }}" class="btn btn-secondary"> <i
                                class="bi bi-file-earmark-pdf"></i> &nbsp; PDF</a>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Expediente</th>
                                <th scope="col">Situacion</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Comentario</th>
                                <th scope="col">Fecha Agregado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        @foreach ($situaciones as $situacion)
                            <tbody>
                                <tr>
                                    <th>{{ $situacion->expediente }}</th>
                                    <th>{{ $situacion->situacion }}</th>
                                    <th>{{ $situacion->fecha }}</th>
                                    <th>{{ $situacion->comentario }}</th>
                                    <th>{{ $situacion->created_at }}</th>
                                    <th class="row">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a class="btn  btn-sm btn-outline-dark"
                                                href="{{ route('situaciones.edit', $situacion->id) }}"><i
                                                    class="bi bi-pencil-fill"></i></a>
                                            <a class="btn btn-sm btn-outline-dark" id="delete"
                                                href="{{ route('situaciones.delete', $situacion->id) }}"><i
                                                    class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </th>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
@endsection
