{{-- @php
        dd($estados->links());
@endphp --}}

@extends('admin.admin_master')

@section('admin')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Todos los Estados</h5>
                    @can('estados-create')
                        <a class="btn btn-primary" href="{{ route('estados.post') }}"> <i class="bi bi-plus-circle"></i> &nbsp;
                            Add
                            Estado</a>
                    @endcan

                    <a href="{{ route('estados.export') }}" class="btn btn-secondary"> <i
                            class="bi bi-file-earmark-excel-fill"></i> &nbsp; Estados</a>

                    <a href="{{ route('estados.createPDF') }}" class="btn btn-secondary"> <i
                            class="bi bi-file-earmark-excel-fill"></i> &nbsp; Estados</a>


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
                            @foreach ($estados as $estado)
                                <tr>
                                    <th>{{ $estado->Nombre }}</th>
                                    <th>{{ $estado->created_at }}</th>
                                    <th class="row">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            @can('estados-edit')
                                                <a class="btn  btn-sm btn-outline-dark"
                                                    href="{{ route('estados.edit', $estado->id) }}"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                            @endcan
                                            @can('estados-delete')
                                                <a class="btn btn-sm btn-outline-dark" id="delete"
                                                    href="{{ route('estados.delete', $estado->id) }}"><i
                                                        class="bi bi-trash-fill"></i></a>
                                            @endcan
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex">
                              {!! $estados->links() !!}
                    </div>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </div>
    </div>
@endsection
