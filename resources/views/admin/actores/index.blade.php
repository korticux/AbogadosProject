@extends('admin.admin_master')

@section('admin')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Datatables</h5>
                    <a class="btn btn-primary" href="{{ route('actores.post') }}"> <i class="bi bi-plus-circle"></i> &nbsp;
                        Agregar
                        Actores</a>
                    <a href="{{ route('actores.export') }}" class="btn btn-secondary"> <i
                            class="bi bi-file-earmark-excel-fill"></i> &nbsp; Actores</a>
                            <a href="{{ URL::to('/actores/createPDF') }}" class="btn btn-secondary"> <i
                                class="bi bi-file-earmark-pdf"></i> &nbsp; PDF</a>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col"># De Cliente</th>
                                <th scope="col">nombre</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        @foreach ($actores as $actor)
                            <tbody>
                                <tr>
                                    <th>{{ $actor->nocliente }}</th>
                                    <th>{{ $actor->nombre }}</th>
                                    <th>{{ $actor->correo }}</th>
                                    <th class="row">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            @can('actores-edit')
                                                <a class="btn  btn-sm btn-outline-dark"
                                                    href="{{ route('actores.edit', $actor->id) }}"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                            @endcan
                                            @can('estados-delete')
                                                <a class="btn btn-sm btn-outline-dark" id="delete"
                                                    href="{{ route('actores.delete', $actor->id) }}"><i
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
