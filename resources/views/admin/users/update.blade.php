@extends('admin.admin_master')

@section('admin')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Crear Usuario</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" method="POST" action="{{ route('usuario.update',  $user->id) }}">
                @csrf
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" value="{{ $user->name }}" name="name" class="form-control" id="floatingName"
                            placeholder="Ingresar Nombre">
                        @error('Nombre')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="Nombre">Nombre del Usuario</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="email" value="{{ $user->email }}" name="email" class="form-control" id="floatingName"
                            placeholder="Ingresar Email">
                        @error('email')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="email">Correo del Usuario</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="password" value="{{ $user->password }}" name="password" class="form-control" id="floatingName"
                            placeholder="Ingresar Contraseña">
                        @error('password')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="password">Contraseña</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="password" name="confirm-password" class="form-control" id="floatingName"
                            placeholder="Ingresar Contraseña">
                        @error('confirm-password')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                        <label for="email">Confirmar Contraseña</label>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong>Role:</strong>
                        {!! Form::select('roles[]', $roles, [], ['class' => 'form-control', 'multiple']) !!}
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('usuario.index') }}" type="reset" class="btn btn-secondary">Regresar</a>
                </div>
            </form><!-- End floating Labels Form -->

        </div>
    </div>
@endsection
