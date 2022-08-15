@extends('admin.admin_master')

@section('admin')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Expedientes</h5>
                    @can('expedientes-create')
                        <a class="btn btn-primary" href="{{ route('expedientes.post') }}"> <i class="bi bi-plus-circle"></i>
                            &nbsp;
                            Agregar
                            Expediente</a>
                    @endcan

                    <a href="{{ route('expedientes.export') }}" class="btn btn-secondary"> <i
                            class="bi bi-file-earmark-excel-fill"></i> &nbsp; Excel</a>

                    <a href="{{ URL::to('/expedientes/createPDF') }}" class="btn btn-secondary"> <i
                            class="bi bi-file-earmark-pdf"></i> &nbsp; PDF</a>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Núm. Exp.</th>
                                <th scope="col">Año</th>
                                <th scope="col">Sala</th>
                                <th scope="col">Ponencia</th>
                                <th scope="col">Actor</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expedientes as $expediente)
                                <tr>
                                    <th>{{ $expediente->numero }}</th>
                                    <th>{{ $expediente->ano }}</th>
                                    <th>{{ $expediente->sala }}</th>
                                    <th>{{ $expediente->ponencia }}</th>
                                    <th>{{ $expediente->actor->nombre ?? 'Ninguno' }}</th>
                                    <th class="row">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            @can('expedientes-edit')
                                                <a class="btn  btn-sm btn-outline-dark"
                                                    href="{{ route('expedientes.edit', $expediente->id) }}"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                            @endcan
                                            @can('expedientes-delete')
                                                <a class="btn btn-sm btn-outline-dark" id="delete"
                                                    href="{{ route('expedientes.delete', $expediente->id) }}"><i
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
                        {!! $expedientes->links() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
