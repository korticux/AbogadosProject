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
                                <th class="text-center" scope="col lg-4">Cobranza</th>
                                <th class="text-center" scope="col lg-4">Actor</th>
                                <th class="text-center" scope="col lg-4">Fecha</th>
                                <th class="text-center" scope="col lg-4">Monto percibido</th>
                                <th class="text-center" scope="col lg-4">Total</th>
                                <th class="text-center" scope="col lg-4">Acciones</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cobranzas as $cobranza)

                            @php
                                $mt = DB::table('pagos_cobranzas')->where('cobranza_id', '=', $cobranza->id)->get();
                                $mtt = $mt->sum('monto');

                                    DB::table("cobranzas")->where('id','=',$cobranza->id)->update([
                                        'monto_percibido' => $mtt,
                                    ]);

                            @endphp
                                <tr>
                                    <th class="text-center" scope="col lg-4">{{ $cobranza->cobranza }}</th>
                                    <th class="text-center" scope="col lg-4">{{ $cobranza->actor->nombre ?? ''}}</th>
                                    <th class="text-center" scope="col lg-4">{{ $cobranza->fecha }}</th>
                                    <th class="text-center" scope="col lg-4">$ {{ number_format($cobranza->monto_percibido, 2) }}</th>
                                    <th class="text-center" scope="col lg-4">$ {{ number_format($cobranza->total, 2) }}</th>
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
                        {!! $cobranzas->links() !!}
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
