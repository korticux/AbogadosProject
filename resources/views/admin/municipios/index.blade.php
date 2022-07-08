@extends('admin.admin_master')

@section('admin')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Municipios</h5>
                    @can('municipios-create')
                        <a class="btn btn-primary" href="{{ route('municipios.post') }}"> <i class="bi bi-plus-circle"></i>
                            &nbsp;
                            Agregar
                            Municipio</a>
                    @endcan

                    <a href="{{ route('municipios.export') }}" class="btn btn-secondary"> <i
                            class="bi bi-file-earmark-excel-fill"></i> &nbsp; Excel</a>

                    <a href="{{ URL::to('/municipios/createPDF') }}" class="btn btn-secondary"> <i
                            class="bi bi-file-earmark-pdf"></i> &nbsp; PDF</a>


                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Nombre </th>
                                <th scope="col">Fecha Agregado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($municipios as $municipio)
                                <tr>
                                    <th>{{ $municipio->nombre }}</th>
                                    <th>{{ $municipio->created_at }}</th>
                                    <th class="row">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            @can('municipios-edit')
                                                <a class="btn  btn-sm btn-outline-dark"
                                                    href="{{ route('municipios.edit', $municipio->id) }}"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                            @endcan
                                            @can('municipios-delete')
                                                <a class="btn btn-sm btn-outline-dark" id="delete"
                                                    href="{{ route('municipios.delete', $municipio->id) }}"><i
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
