@extends('admin.admin_master')


@section('admin')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Editar Role</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" action="{{ route('roles.update', $role->id) }}">
                @csrf
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" value="{{ $role->name }}" name="name" class="form-control" id="floatingName"
                            placeholder="Ingresar Nombre">
                        @error('name')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="nombre">Nombre Del Role</label>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Permission:</strong>

                        <br />

                        @foreach ($permission as $value)
                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}

                                {{ $value->name }}</label>

                            <br />
                        @endforeach

                    </div>

                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('roles.index') }}" type="reset" class="btn btn-secondary">Regresar</a>
                </div>
            </form><!-- End floating Labels Form -->

        </div>
    </div>
@endsection
