@extends('admin.admin_master')

@section('admin')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Procesos</h5>

                    @can('procesos-create')
                        <a class="btn btn-primary" href="{{ route('proceso.post') }}"> <i class="bi bi-plus-circle"></i> &nbsp;
                            Agregar
                            Proceso</a>
                    @endcan

                    <a href="{{ route('proceso.export') }}" class="btn btn-secondary"> <i
                            class="bi bi-file-earmark-excel-fill"></i> &nbsp; Excel</a>


                    <a href="{{ URL::to('/proceso/createPDF') }}" class="btn btn-secondary"> <i
                            class="bi bi-file-earmark-pdf"></i> &nbsp; PDF</a>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Numero de expediente</th>
                                <th scope="col">Fecha de Ingreso</th>
                                <th scope="col">Numero de oficio</th>
                                <th scope="col">Quien Recibio</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($procesos as $proceso)
                                <tr>
                                    <th>{{ $proceso->expedientes->numero_exp ?? 'ninguno' }}</th>
                                    <th>{{ $proceso->fecha_de_ingreso }}</th>
                                    <th>{{ $proceso->numero_de_oficio }}</th>
                                    <th>{{ $proceso->quien_recibio }}</th>
                                    <th class="row">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a class="btn  btn-sm btn-outline-dark"
                                                href="{{ route('proceso.edit', $proceso->id) }}"><i
                                                    class="bi bi-pencil-fill"></i></a>
                                            <a class="btn btn-sm btn-outline-dark" id="delete"
                                                href="{{ route('proceso.delete', $proceso->id) }}"><i
                                                    class="bi bi-trash-fill"></i></a>
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                    <div class="d-flex">
                        {!! $procesos->links() !!}
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
