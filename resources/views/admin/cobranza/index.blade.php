@extends('admin.admin_master')

@section('admin')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Cobranza</h5>
                    @can('cobranza-create')
                        <a class="btn btn-primary" href="{{ route('cobranza.post') }}"> <i class="bi bi-plus-circle"></i> &nbsp;
                            Agregar
                            Cobranza</a>
                    @endcan

                    <a href="{{ route('cobranza.export') }}" class="btn btn-secondary"> <i
                            class="bi bi-file-earmark-excel-fill"></i> &nbsp; Excel</a>

                    <a href="{{ URL::to('/cobranza/createPDF') }}" class="btn btn-secondary"> <i
                            class="bi bi-file-earmark-pdf"></i> &nbsp; PDF</a>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Cobranza</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Monto</th>
                                <th scope="col">Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cobranzas as $cobranza)
                                <tr>
                                    <th>{{ $cobranza->cobranza }}</th>
                                    <th>{{ $cobranza->tipo }}</th>
                                    <th>{{ $cobranza->fecha }}</th>
                                    <th>$ {{ $cobranza->monto }}</th>
                                    <th class="row">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            @can('cobranza-edit')
                                                <a class="btn  btn-sm btn-outline-dark"
                                                    href="{{ route('cobranza.edit', $cobranza->id) }}"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                            @endcan
                                            @can('cobranza-delete')
                                                <a class="btn btn-sm btn-outline-dark" id="delete"
                                                    href="{{ route('cobranza.delete', $cobranza->id) }}"><i
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
                        {!! $cobranza->links() !!}
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
