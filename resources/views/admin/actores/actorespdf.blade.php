@extends('admin.admin_master')

@section('admin')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Num. Cliente</th>
                <th scope="col">Nombre</th>
                <th scope="col">Curp</th>
                <th scope="col">Rfc</th>
                <th scope="col">Nacimiento</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Domicilio</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Creado el</th>
            </tr>
        </thead>
        @foreach ($actores as $actor)
            <tbody>
                <tr>
                    <th>{{ $actor->id }}</th>
                    <th>{{ $actor->nocliente }}</th>
                    <th>{{ $actor->nombre }}</th>
                    <th>{{ $actor->curp }}</th>
                    <th>{{ $actor->rfc }}</th>
                    <th>{{ $actor->nacimiento }}</th>
                    <th>{{ $actor->correo }}</th>
                    <th>{{ $actor->telefono }}</th>
                    <th>{{ $actor->domicilio }}</th>
                    <th>{{ $actor->ciudad }}</th>
                    <th>{{ $actor->created_at }}</th>
                </tr>
            </tbody>
        @endforeach
    </table>
@endsection
