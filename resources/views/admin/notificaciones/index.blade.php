@extends('admin.admin_master')

@section('admin')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">


                    <h5 class="card-title">Notificaciones</h5>

                    @can('notificaciones-create')
                        <a class="btn btn-primary" href="{{ route('notificaciones.post') }}"> <i class="bi bi-plus-circle"></i>
                            &nbsp;
                            Agregar
                            Notificacion</a>
                    @endcan


                    <a href="{{ route('notificaciones.export') }}" class="btn btn-secondary"> <i
                            class="bi bi-file-earmark-excel-fill"></i> &nbsp; Excel</a>

                    <a href="{{ URL::to('/notificaciones/createPDF') }}" class="btn btn-secondary"> <i
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
                        <>
                            @foreach ($notificaciones as $notificacion)
                                <tr>
                                    <th>{{ $notificacion->nombre }}</th>
                                    <th>{{ $notificacion->created_at }}</th>
                                    <th class="row">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            @can('notificaciones-edit')
                                                <a class="btn  btn-sm btn-outline-dark"
                                                    href="{{ route('notificaciones.edit', $notificacion->id) }}"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                            @endcan
                                            @can('notificaciones-delete')
                                                <a class="btn btn-sm btn-outline-dark" id="delete"
                                                    href="{{ route('notificaciones.delete', $notificacion->id) }}"><i
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
                        {!! $notificaciones->links() !!}
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
