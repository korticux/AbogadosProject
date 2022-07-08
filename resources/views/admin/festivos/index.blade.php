@extends('admin.admin_master')

@section('admin')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Datatables</h5>
                    @can('festivos-create')
                        <a class="btn btn-primary" href="{{ route('festivos.post') }}"> <i class="bi bi-plus-circle"></i> &nbsp;
                            Agregar
                            Festivo</a>
                    @endcan


                    <a href="{{ route('festivos.export') }}" class="btn btn-secondary"> <i
                            class="bi bi-file-earmark-excel-fill"></i> &nbsp; Festivos</a>

                    <a href="{{ URL::to('/festivos/createPDF') }}" class="btn btn-secondary"> <i
                            class="bi bi-file-earmark-pdf"></i> &nbsp; PDF</a>


                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        @foreach ($festivos as $festivo)
                            <tbody>
                                <tr>
                                    <th>{{ $festivo->nombre }}</th>
                                    <th>{{ $festivo->fecha }}</th>
                                    <th class="row">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            @can('festivos-edit')
                                                <a class="btn  btn-sm btn-outline-dark"
                                                    href="{{ route('festivos.edit', $festivo->id) }}"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                            @endcan
                                            @can('festivos-delete')
                                                <a class="btn btn-sm btn-outline-dark" id="delete"
                                                    href="{{ route('festivos.delete', $festivo->id) }}"><i
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
