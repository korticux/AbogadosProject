@extends('admin.admin_master')

@section('admin')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Tramites</h5>

                    @can('tramites-create')
                        <a class="btn btn-primary" href="{{ route('tramites.post') }}"> <i class="bi bi-plus-circle"></i> &nbsp;
                            Agregar
                            Tramite</a>
                    @endcan
                    <a href="{{ route('tramites.export') }}" class="btn btn-secondary"> <i
                        class="bi bi-file-earmark-excel-fill"></i> &nbsp; Excel</a>

                    <a href="{{ URL::to('/tramites/createPDF') }}" class="btn btn-secondary"> <i
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
                        <tbody>
                            @foreach ($tramites as $tramite)
                                <tr>
                                    <th>{{ $tramite->nombre }}</th>
                                    <th>{{ $tramite->created_at }}</th>
                                    <th class="row">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a class="btn  btn-sm btn-outline-dark"
                                                href="{{ route('tramites.edit', $tramite->id) }}"><i
                                                    class="bi bi-pencil-fill"></i></a>
                                            <a class="btn btn-sm btn-outline-dark" id="delete"
                                                href="{{ route('tramites.delete', $tramite->id) }}"><i
                                                    class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                    <div class="d-flex">
                        {!! $tramites->links() !!}
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
