@extends('admin.admin_master')

@section('admin')
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">Cuentas</h5>
                    <h5 class="card-title">Datatables</h5>
                    @can('cuentas-create')
                        <a class="btn btn-primary" href="{{ route('cuentas.post') }}"> <i class="bi bi-plus-circle"></i> &nbsp;
                            Agregar
                            Cuenta</a>
                    @endcan

                    <a href="{{ route('cuentas.export') }}" class="btn btn-secondary"> <i
                            class="bi bi-file-earmark-excel-fill"></i> &nbsp; Excel</a>

                    <a href="{{ URL::to('/cuentas/createPDF') }}" class="btn btn-secondary"> <i
                            class="bi bi-file-earmark-pdf"></i> &nbsp; PDF</a>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Banco</th>
                                <th scope="col">Cuenta</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cuentas as $cuenta)
                                <tr>
                                    <th>{{ $cuenta->banco }}</th>
                                    <th>{{ $cuenta->cuenta }}</th>
                                    <th class="row">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            @can('cuentas-edit')
                                                <a class="btn  btn-sm btn-outline-dark"
                                                    href="{{ route('cuentas.edit', $cuenta->id) }}"><i
                                                        class="bi bi-pencil-fill"></i></a>
                                            @endcan
                                            @can('cuentas-delete')
                                                <a class="btn btn-sm btn-outline-dark" id="delete"
                                                    href="{{ route('cuentas.delete', $cuenta->id) }}"><i
                                                        class="bi bi-trash-fill"></i></a>
                                            @endcan
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->


                </div>
            </div>

        </div>
    </div>
@endsection
