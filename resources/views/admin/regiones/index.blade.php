@extends('admin.admin_master')

@section('admin')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Regiones</h5>

                    @can('regiones-create')
                        <a class="btn btn-primary" href="{{ route('regiones.post') }}"> <i class="bi bi-plus-circle"></i> &nbsp;
                            Agregar
                            Regiones</a>
                    @endcan

                    <a href="{{ route('regiones.export') }}" class="btn btn-secondary"> <i
                            class="bi bi-file-earmark-excel-fill"></i> &nbsp; Excel</a>

                    <a href="{{ URL::to('/regiones/createPDF') }}" class="btn btn-secondary"> <i
                            class="bi bi-file-earmark-pdf"></i> &nbsp; PDF</a>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Numero</th>
                                <th scope="col">Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($regiones as $region)
                                <tr>
                                    <th>{{ $region->numero }}</th>
                                    <th>{{ $region->nombre }}</th>
                                    <th class="row">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            @can('regiones-edit')
                                                <a class="btn  btn-sm btn-outline-dark"
                                                    href="{{ route('regiones.edit', $region->id) }}"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                            @endcan
                                            @can('regiones-delete')
                                                <a class="btn btn-sm btn-outline-dark" id="delete"
                                                    href="{{ route('regiones.delete', $region->id) }}"><i
                                                        class="bi bi-trash-fill"></i></a>
                                            @endcan
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
@endsection
