@extends('admin.admin_master')

@section('admin')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Peticiones</h5>

                    @can('peticiones-create')
                        <a class="btn btn-primary" href="{{ route('peticiones.post') }}"> <i class="bi bi-plus-circle"></i>
                            &nbsp;
                            Agregar
                            Peticion</a>
                    @endcan

                    <a href="{{ route('peticiones.export') }}" class="btn btn-secondary"> <i
                            class="bi bi-file-earmark-excel-fill"></i> &nbsp; Excel</a>

                    <a href="{{ URL::to('/peticiones/createPDF') }}" class="btn btn-secondary"> <i
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
                        @foreach ($peticiones as $peticion)
                            <tbody>
                                <tr>
                                    <th>{{ $peticion->lugar }}</th>
                                    <th>{{ $peticion->created_at }}</th>
                                    <th class="row">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            @can('peticiones-edit')
                                                <a class="btn  btn-sm btn-outline-dark"
                                                    href="{{ route('peticiones.edit', $peticion->id) }}"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                            @endcan
                                            @can('peticiones-delete')
                                                <a class="btn btn-sm btn-outline-dark" id="delete"
                                                    href="{{ route('peticiones.delete', $peticion->id) }}"><i
                                                        class="bi bi-trash-fill"></i></a>
                                            @endcan
                                        </div>
                                    </th>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                    <!-- End Table with stripped rows -->

                    <div class="d-flex">
                        {!! $peticiones->links() !!}
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
