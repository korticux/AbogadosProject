@extends('admin.admin_master')



@section('admin')
    @php
        use App\Models\Festivos;
        use Carbon\Carbon;
        include app_path('funciones.php');
    @endphp


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
                                    Fecha de vencimiento</th>

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
                                            $numberOfDaysToAdd = 15;
                                            $fecha_db = 14;
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha14 }} </td>
                                    @break

                                    @case($i == 13)
                                        @php
                                            $tramite = 'Solicitud de firmeza: ';
                                            $numberOfDaysToAdd = 16;
                                            $fecha_db = 13;
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha13 }} </td>
                                    @break

                                    @case($i == 12)
                                        @php
                                            $tramite = 'Recurso de revision: ';
                                            $numberOfDaysToAdd = 15;
                                            $fecha_db = 12;
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha12 }} </td>
                                    @break

                                    @case($i == 11)
                                        @php
                                            $tramite = 'Dictamen de Sentencia: ';
                                            $numberOfDaysToAdd = 45;
                                            $fecha_db = 11;
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha8 }} </td>
                                    @break

                                    @case($i == 10)
                                        @php
                                            $tramite = 'Cierre de instrucción: ';
                                            $numberOfDaysToAdd = 30;
                                            $fecha_db = 10;
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha11 }} </td>
                                    @break

                                    @case($i == 9)
                                        @php
                                            $tramite = 'Alegatos: ';
                                            $numberOfDaysToAdd = 7;
                                            $fecha_db = 9;
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha10 }} </td>
                                    @break

                                    @case($i == 8)
                                        @php
                                            $tramite = 'Contestacion de ampliación: ';
                                            $numberOfDaysToAdd = 18;
                                            $fecha_db = 8;
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha9 }} </td>
                                    @break

                                    @case($i == 7)
                                        @php
                                            $tramite = 'Ampliación Admitida: ';
                                            $numberOfDaysToAdd = 15;
                                            $fecha_db = 7;
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha7 }} </td>
                                    @break

                                    @case($i == 6)
                                        @php
                                            $tramite = 'Ampliación ingresada: ';
                                            $numberOfDaysToAdd = 13;
                                            $fecha_db = 6;
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha6 }} </td>
                                    @break

                                    @case($i == 5)
                                        @php
                                            $tramite = 'Contestación de Demanda: ';
                                            $numberOfDaysToAdd = 33;
                                            $fecha_db = 5;
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha5 }} </td>
                                    @break

                                    @case($i == 4)
                                        @php
                                            $tramite = 'Admision de Demanda: ';
                                            $numberOfDaysToAdd = 30;
                                            $fecha_db = 4;
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha4 }} </td>
                                    @break

                                    @case($i == 3)
                                        @php
                                            $tramite = 'Ingreso de demanda: ';
                                            $numberOfDaysToAdd = 15;
                                            $fecha_db = 3;
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha3 }} </td>
                                    @break

                                    @case($i == 2)
                                        @php
                                            $tramite = 'Desechadas, Sobreseimientos, Requerimientos, Incidentes, Reclamos: ';
                                            $numberOfDaysToAdd = 10;
                                            $fecha_db = 2;
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha2 }} </td>
                                    @break

                                    @case($i == 1)
                                        @php
                                            $tramite = 'Ingreso de Petición ISSSTE: ';
                                            $numberOfDaysToAdd = 30;
                                            $fecha_db = 1;
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite . $expediente->fecha1 }} </td>
                                    @break

                                    @case($i == 0)
                                        @php
                                            $tramite = 'N/A';
                                            $numberOfDaysToAdd = 0;
                                        @endphp
                                        <td class="dtr-control sorting_1 text-center" tabindex="0">
                                            {{ $tramite }} </td>
                                    @break
                                @endswitch





                                @if ($tramite != 'N/A')
                                    @php
                                        $date = 'fecha' . $fecha_db;
                                        $startingDate = date('Y-m-d', strtotime($expediente->$date));

                                        $deadlineDatefecha = calculateDeadline($startingDate, $numberOfDaysToAdd);
                                        $deadline_fecha = date('d-m-Y', strtotime($deadlineDatefecha));
                                    @endphp
                                    <td class="dtr-control sorting_1 text-center" tabindex="0">
                                        <label class="text-danger"><b> {{ $deadline_fecha }} </b>
                                    </td>
                                @elseif($tramite == 'N/A')
                                    <td class="dtr-control sorting_1 text-center" tabindex="0">
                                        <label class="text-danger"><b> N/A </b>
                                    </td>
                                @endif






                                <td class="dtr-control sorting_1 text-center" tabindex="0">
                                    <a class="btn  btn-sm btn-outline-dark"
                                        href="{{ route('expedientes.edit', $expediente->id) }}"><i
                                            class="bi bi-eye"></i></a>
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
