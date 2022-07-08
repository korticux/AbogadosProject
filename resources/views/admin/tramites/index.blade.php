@extends('admin.admin_master')

@section('admin')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
<<<<<<< HEAD
                    <h5 class="card-title">• Tramites</h5>
                    <a class="btn btn-primary" href="{{ route('tramites.post') }}"> <i class="bi bi-plus-circle"></i> &nbsp;
                        Agregar
                        Tramite</a>

                        <a href="{{ route('tramites.export') }}" class="btn btn-secondary"> <i
                            class="bi bi-file-earmark-excel-fill"></i> &nbsp; Excel</a>

                        <a href="{{ URL::to('/tramites/createPDF') }}" class="btn btn-secondary"> <i
=======
                    <h5 class="card-title">Datatables</h5>
                    @can('tramites-create')
                        <a class="btn btn-primary" href="{{ route('tramites.post') }}"> <i class="bi bi-plus-circle"></i> &nbsp;
                            Agregar
                            Tramite</a>
                    @endcan

                    <a href="{{ URL::to('/tramites/createPDF') }}" class="btn btn-secondary"> <i
>>>>>>> 5216f75d5daaf47b6486d2c22d6e035e7c10fcc1
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
                        @foreach ($tramites as $tramite)
                            <tbody>
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
                            </tbody>
                        @endforeach
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
@endsection
