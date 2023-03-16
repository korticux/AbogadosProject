@extends('admin.admin_master')


@section('admin')


                <!-- Search Form -->
                <div class="col-8">
                    <form action="{{ route('busqueda') }}" method="POST">
                        @method('POST')
                        @csrf
                    <div class="banner-search-wrap">

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tabs_1">
                                <div class="rld-main-search">
                                    <div class="row">
                                        <div class="rld-single-input">
                                            <input name="uin" type="text" placeholder="Escribe...">
                                        </div>


                                        <div class="rld-single-select">
                                            <select name="estatus" id="estatus"
                                                class="select single-select mr-0"
                                                style="width: 100%;height: 100%;">
                                                <option selected="selected" value="">Selecciona el estatus
                                                </option>
                                                @foreach ($estatuses as $estatus)
                                                    <option value={{ $estatus->id }}>
                                                        {{ $estatus->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>



                                            <div class="col-6">
                                                <label class="col-sm-8 col-form-label" style="width:100%; padding-left:200px;"><small>Desde</small></label>
                                                <input type="date" value="" name="from_date" class="form-control"
                                                    id="from_date" placeholder="Ingresar fecha">
                                                @error('from_date')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>



                                            <div class="col-6">
                                                <label class="col-sm-6 col-form-label" style="width:100%; padding-left:200px;"><small>Hasta</small></label>
                                                <input type="date" value="" name="to_date" class="form-control"
                                                    id="to_date" placeholder="Ingresar ultima fecha">
                                                @error('to_date')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>




                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <!--/ End Search Form -->
                <div class="col-xl-3 col-lg-2 col-md-4">
                    <button class="btn" type='submit' value="busk" name="buscar"
                        href="{{ route('busqueda') }}">Buscar</button>
                </div>

@endsection

@section('js')


    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="estatus"]').on('change', function() {
                var estatus = $(this).val();
            });

            $('li[name="estatus_propiedad"]').on('change', function() {
                var estatus_propiedad = $(this).val();
            });

            let buscar = document.getElementById("buscar");

            // Adding event listener to button
            buscar.addEventListener("click", () => {
                // Fetching Button value
                let btnValue = buscar.value;
            });




            if (tipo_propiedad || colonia) {
                $.ajax({
                    btnValue: btnValue
                    url: "route('busqueda')",
                    type: "POST",
                    dataType: "json",
                    success: function(response) {
                        var d1 = $('select[name="estatus"]').empty();
                        var d2 = $('select[name="vcolonia"]').empty();
                        var d3 = $('select[name="vestatus_propiedad"]').empty();
                        $.each(response, function(key, value) {
                            console.log(value.estatus);
                            console.log(value.vcolonia);
                            console.log(value.vestatus_propiedad);
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    </script>

@endsection
