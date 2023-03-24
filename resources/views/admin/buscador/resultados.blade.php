@extends('admin.admin_master')

@section('admin')
    <div class="pro-wrapper">
        <div class="detail-wrapper-body">
            <div class="listing-title-bar">
                <div class="text-heading text-left">
                    <br><br>

                </div>
                <h3>Resultados de la busqueda...</h3>


            </div>



            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                        aria-describedby="example1_info">
                        <thead>
                            <tr>

                                <th class="sorting sorting_asc text-center" tabindex="0" aria-controls="example1"
                                    rowspan="1" colspan="1" aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">
                                    Núm. Exp.
                                </th>

                                <th class="sorting sorting_asc text-center" tabindex="0" aria-controls="example1"
                                    rowspan="1" colspan="1" aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">
                                    Nombre
                                </th>

                                <th class="sorting sorting_asc text-center" tabindex="0" aria-controls="example1"
                                    rowspan="1" colspan="1" aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">
                                    Región
                                </th>

                                <th class="sorting sorting_asc text-center" tabindex="0" aria-controls="example1"
                                    rowspan="1" colspan="1" aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">
                                    Tramite
                                </th>


                                <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="Browser: activate to sort column ascending">
                                    Estatus</th>

                                <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="Browser: activate to sort column ascending">
                                    Monto Pendiente</th>

                                <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="Browser: activate to sort column ascending">
                                    Parte del tramite</th>

                                <th class="sorting text-center" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-label="Browser: activate to sort column ascending">
                                    Archivos</th>


                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($expedientes as $expediente)
                                @php
                                    if (empty($expediente->region->numero)) {
                                        $rn = '';
                                    } elseif ($expediente->region->numero != null) {
                                        $rn = $expediente->region->numero;
                                    }

                                @endphp

                                @php

                                    $abonado = DB::table('cobranzas')
                                        ->where('actor_id', '=', $expediente->actor->id)
                                        ->get();
                                    $conteo = count($abonado);
                                    if ($conteo >= 1) {
                                        $abon = $abonado[0]->monto_percibido;
                                        $pendiente = $expediente->actor->honorario - $abonado[0]->monto_percibido;
                                    } elseif ($conteo == 0) {
                                        $abon = '0';
                                        $pendiente = '0';
                                    } else {
                                        $abon = '0';
                                        $pendiente = '0';
                                    }
                                @endphp


                                <tr class="odd">

                                    <td class='dtr-control sorting_1 text-center'>
                                        {{ $expediente->numero . ' / ' . $expediente->ano . ' - ' . $rn . ' - ' . $expediente->sala . ' - ' . $expediente->ponencia }}
                                    </td>

                                    <td class='dtr-control sorting_1 text-center'>
                                        {{ $expediente->actor->nombre ?? 'N/A' }}</td>

                                    <td class="dtr-control sorting_1 text-center" tabindex="0">
                                        {{ $expediente->region->nombre ?? 'N/A' }}</td>

                                    <td class='dtr-control sorting_1 text-center'>
                                        {{ $expediente->tramite->nombre ?? 'N/A' }}</td>

                                    <td class="dtr-control sorting_1 text-center" tabindex="0">
                                        {{ $expediente->estatus->nombre ?? 'N/A' }}</td>

                                    <td class="dtr-control sorting_1 text-center" tabindex="0">
                                        {{ number_format($pendiente, 2) ?? 'N/A' }}</td>



                                    @for ($i = 14; $i > 0; $i--)
                                        @php
                                            $index = 'fecha' . $i;
                                        @endphp
                                        @if (!is_null($expediente->$index))
                                        @break
                                    @endif
                                @endfor


                                @switch(true)
                                    @case($i == 14)
                                        @php
                                            $tramite = 'Amparo: ';
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha14 }} </td>
                                    @break

                                    @case($i == 13)
                                        @php
                                            $tramite = 'Solicitud de firmeza: ';
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha13 }} </td>
                                    @break

                                    @case($i == 12)
                                        @php
                                            $tramite = 'Recurso de revision: ';
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha12 }} </td>
                                    @break

                                    @case($i == 11)
                                        @php
                                            $tramite = 'Cierre de instrucción: ';
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha11 }} </td>
                                    @break

                                    @case($i == 10)
                                        @php
                                            $tramite = 'Alegatos: ';
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha10 }} </td>
                                    @break

                                    @case($i == 9)
                                        @php
                                            $tramite = 'Contestacion de ampliación: ';
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha9 }} </td>
                                    @break

                                    @case($i == 8)
                                        @php
                                            $tramite = 'Ampliación ingresada: ';
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha8 }} </td>
                                    @break

                                    @case($i == 7)
                                        @php
                                            $tramite = 'Contestación de Demanda: ';
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha7 }} </td>
                                    @break

                                    @case($i == 6)
                                        @php
                                            $tramite = 'Ingreso de demanda: ';
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha6 }} </td>
                                    @break

                                    @case($i == 5)
                                        @php
                                            $tramite = 'Dictamen de Sentencia: ';
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha5 }} </td>
                                    @break

                                    @case($i == 4)
                                        @php
                                            $tramite = 'Ampliación Admitida: ';
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha4 }} </td>
                                    @break

                                    @case($i == 3)
                                        @php
                                            $tramite = 'Admision de Demanda: ';
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha3 }} </td>
                                    @break

                                    @case($i == 2)
                                        @php
                                            $tramite = 'Desechadas, Sobreseimientos, Requerimientos, Incidentes, Reclamos: ';
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha2 }} </td>
                                    @break

                                    @case($i == 1)
                                        @php
                                            $tramite = 'Ingreso de Petición ISSSTE: ';
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha1 }} </td>
                                    @break

                                    @case($i == 0)
                                        @php
                                            $tramite = 'N/A';
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite }} </td>
                                    @break
                                @endswitch

                                <td class="dtr-control sorting_1 text-center" tabindex="0">
                                    <a class="btn  btn-sm btn-outline-dark"
                                        href="{{ route('expedientes.edit', $expediente->id) }}"><i
                                            class="bi bi-pencil-fill"></i></a>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
</div>
@endsection
