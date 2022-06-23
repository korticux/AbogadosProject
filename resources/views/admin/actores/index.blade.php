@extends('admin.admin_master')

@section('admin')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Datatables</h5>
                    <a class="btn btn-primary" href="{{ route('actores.post') }}"> <i class="bi bi-plus-circle"></i> &nbsp;
                        Add
                        Actores</a>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col"># De Cliente</th>
                                <th scope="col">nombre</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Accions</th>
                            </tr>
                        </thead>
                        @foreach ($actores as $actor)
                            <tbody>
                                <tr>
                                    <th>{{ $actor->nocliente }}</th>
                                    <th>{{ $estado->nombre }}</th>
                                    <th>{{ $estado->correo }}</th>
                                    <th class="row">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a class="btn  btn-sm btn-outline-dark"><i class="bi bi-pencil-fill"></i></a>
                                            <a class="btn btn-sm btn-outline-dark"><i class="bi bi-trash-fill"></i></a>
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
