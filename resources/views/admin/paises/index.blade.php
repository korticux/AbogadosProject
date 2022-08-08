@extends('admin.admin_master')

@section('admin')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Paises</h5>

                    @can('paises-create')
                        <a class="btn btn-primary" href="{{ route('paises.post') }}"> <i class="bi bi-plus-circle"></i> &nbsp;
                            Agregar
                            Pais</a>
                    @endcan
                    <a href="{{ route('paises.export') }}" class="btn btn-secondary"> <i
                            class="bi bi-file-earmark-excel-fill"></i> &nbsp; Excel</a>
                    <a href="{{ URL::to('/paises/createPDF') }}" class="btn btn-secondary"> <i
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
                        @foreach ($paises as $pais)

                                <tr>
                                    <th>{{ $pais->nombre }}</th>
                                    <th>{{ $pais->created_at }}</th>
                                    <th class="row">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            @can('paises-edit')
                                                <a class="btn  btn-sm btn-outline-dark"
                                                    href="{{ route('paises.edit', $pais->id) }}"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                            @endcan
                                            @can('paises-delete')
                                                <a class="btn btn-sm btn-outline-dark" id="delete"
                                                    href="{{ route('paises.delete', $pais->id) }}"><i
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
                        {!! $paises->links() !!}
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
