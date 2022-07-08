@extends('admin.admin_master')

@section('admin')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Datatables</h5>
                    @can('estatus-create')
                        <a class="btn btn-primary" href="{{ route('estatus.post') }}"> <i class="bi bi-plus-circle"></i> &nbsp;
                            Agregar
                            Estatus</a>
                    @endcan

                    <a href="{{ route('estatus.export') }}" class="btn btn-secondary"> <i
                            class="bi bi-file-earmark-excel-fill"></i> &nbsp; Excel</a>


                    <a href="{{ URL::to('/estatus/pdf') }}" class="btn btn-secondary"> <i
                            class="bi bi-file-earmark-pdf"></i> &nbsp; PDF</a>


                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Fecha Agregado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        @foreach ($estatus as $estatus)
                            <tbody>
                                <tr>
                                    <th>{{ $estatus->nombre }}</th>
                                    <th>{{ $estatus->created_at }}</th>
                                    <th class="row">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            @can('estatus-edit')
                                                <a class="btn  btn-sm btn-outline-dark"
                                                    href="{{ route('estatus.edit', $estatus->id) }}"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                            @endcan
                                            @can('estatus-delete')
                                                <a class="btn btn-sm btn-outline-dark" id="delete"
                                                    href="{{ route('estatus.delete', $estatus->id) }}"><i
                                                        class="bi bi-trash-fill"></i></a>
                                            @endcan
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
