@extends('admin.admin_master')

@section('admin')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Dependencias</h5>

                    @can('dependencias-create')
                        <a class="btn btn-primary" href="{{ route('dependencias.post') }}"> <i class="bi bi-plus-circle"></i>
                            &nbsp;
                            Agregar
                            Dependencias</a>
                    @endcan

                    <a href="{{ route('dependencias.export') }}" class="btn btn-secondary"> <i
                            class="bi bi-file-earmark-excel-fill"></i> &nbsp; Excel</a>


                    <a href="{{ URL::to('/dependencias/createPDF') }}" class="btn btn-secondary"> <i
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
                        @foreach ($dependencias as $dependencia)
                            <tbody>
                                <tr>
                                    <th>{{ $dependencia->nombre }}</th>
                                    <th>{{ $dependencia->created_at }}</th>
                                    <th class="row">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            @can('dependencias-edit')
                                                <a class="btn  btn-sm btn-outline-dark"
                                                    href="{{ route('dependencias.edit', $dependencia->id) }}"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                            @endcan
                                            @can('dependencias-delete')
                                                <a class="btn btn-sm btn-outline-dark" id="delete"
                                                    href="{{ route('dependencias.delete', $dependencia->id) }}"><i
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
                        {!! $dependencias->links() !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
