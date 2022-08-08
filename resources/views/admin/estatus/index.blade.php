@extends('admin.admin_master')

@section('admin')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Estatus</h5>
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
                        @foreach ($estatus as $estatuses)
                            <tbody>
                                <tr>
                                    <th>{{ $estatuses->nombre }}</th>
                                    <th>{{ $estatuses->created_at }}</th>
                                    <th class="row">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            @can('estatus-edit')
                                                <a class="btn  btn-sm btn-outline-dark"
                                                    href="{{ route('estatus.edit', $estatuses->id) }}"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                            @endcan
                                            @can('estatus-delete')
                                                <a class="btn btn-sm btn-outline-dark" id="delete"
                                                    href="{{ route('estatus.delete', $estatuses->id) }}"><i
                                                        class="bi bi-trash-fill"></i></a>
                                            @endcan
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                    <div class="d-flex">
                        {!! $estatus->links() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
