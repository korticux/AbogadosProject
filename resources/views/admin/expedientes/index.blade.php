@extends('admin.admin_master')

@section('admin')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Datatables</h5>
                    <a class="btn btn-primary" href="{{ route('expedientes.post') }}"> <i class="bi bi-plus-circle"></i> &nbsp;
                        Agregar
                        Expediente</a>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Núm.Exp</th>
                                <th scope="col">Año</th>
                                <th scope="col">Región</th>
                                <th scope="col">Sala</th>
                                <th scope="col">Ponencia</th>
                                <th scope="col">Compuesto</th>
                                <th scope="col">Actor</th>
                            </tr>
                        </thead>
                        @foreach ($expedientes as $expediente)
                            <tbody>
                                <tr>
                                    <th>{{ $expediente->nombre }}</th>
                                    <th>{{ $expediente->created_at }}</th>
                                    <th class="row">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a class="btn  btn-sm btn-outline-dark" href="{{ route('expedientes.edit', $expediente->id) }}" ><i class="bi bi-pencil-fill"></i></a>
                                            <a class="btn btn-sm btn-outline-dark" id="delete"
                                                href="{{ route('expedientes.delete', $expediente->id) }}"><i
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
