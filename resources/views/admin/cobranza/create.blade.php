@extends('admin.admin_master')


@section('admin')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Crear Cobranza</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" method="POST" action="{{ route('cobranza.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <div class="form-floathing my-3">
                        <select name="cuenta_id" class="form-select" aria-label="Default select example">
                            <option selected disabled>Selecciona una cuenta</option>
                            @foreach ($cuentas as $cuenta)
                                <option value="{{ $cuenta->id }}">{{ $cuenta->banco }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floathing my-3">
                        <select name="actor_id" class="form-select" aria-label="Default select example">
                            <option selected disabled>Selecciona una actor</option>
                            @foreach ($actores as $actor)
                                <option value="{{ $actor->id }}">{{ $actor->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating my-3">
                        <input type="text" name="cobranza" class="form-control" id="floatingName"
                            placeholder="Ingresar cobranza">
                        @error('cobranza')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="cobranza">Nombre de cobranza</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating my-3">
                        <input type="text" name="tipo" class="form-control" id="floatingName"
                            placeholder="Ingresar tipo">
                        @error('tipo')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="tipo">Tipo de cobranza</label>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-floating my-3">
                        <input type="text" name="referencia" class="form-control" id="floatingName"
                            placeholder="Ingresar referencia">
                        @error('referencia')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="referencia">Referencia</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating my-3">
                        <input type="number"  name="total" class="form-control" id="total"
                            placeholder="Ingresar total">
                        @error('total')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="total">Honorario negociado</label>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-floathing my-3">
                        <label for="fecha">Fecha</label>
                        <input type="date" class="form-control" name="fecha">
                        @error('fecha')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floathing">
                        <label for="nombre_archivo">Documentación de Cobranza</label>
                        <input type="file" name="nombre_archivo[]" class="form-control" multiple>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('cobranza.index') }}" type="reset" class="btn btn-secondary">Regresar</a>
                </div>
            </form><!-- End floating Labels Form -->
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"\
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function(){
       $('select[name="actor_id"]').on('change',function(){
            var actor_id = $(this).val();
            if (actor_id) {

              $.ajax({
                url: "{{ url('/cobranza/post') }}/"+actor_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                var d =$('select[name="total"]').empty();

                $.each(data, function(key, value){
                    console.log(value.honorario);
                $('#total').append(value.honorario);
                $('#total').val(value.honorario);


                });
                },
              });

            }else{
              alert('danger');
            }

              });

        });

   </script>
@endsection
