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
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">

                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1"
                            class="table table-bordered table-striped dataTable dtr-inline"
                            aria-describedby="example1_info">
                            <thead>
                                <tr>

                                    <th class="sorting sorting_asc text-center" tabindex="0"
                                        aria-controls="example1" rowspan="1" colspan="1"
                                        aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">
                                        Nombre
                                    </th>


                                    <th class="sorting text-center" tabindex="0"
                                        aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">
                                        Estatus</th>


                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($expedientes as $expediente)
                                    <tr class="odd">
                                        <td class='dtr-control sorting_1 text-center'>
                                            {{ ($expediente->actor->nombre) }}</td>

                                            <td class="dtr-control sorting_1 text-center"
                                            tabindex="0">{{ $expediente->estatus->nombre ?? 'N/A' }}</td>



                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
