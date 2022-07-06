<table class="table" border='1'>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col"># De Cliente</th>
        <th scope="col">Nombre</th>
        <th scope="col">Correo</th>
        <th scope="col">Telefono</th>
        <th scope="col">CURP</th>
      </tr>
    </thead>
    <tbody>
        @foreach($datos as $dato)
      <tr>
        <th scope="row">{{$dato->id}}</th>
        <td>{{$dato->nocliente}}</td>
        <td>{{$dato->nombre}}</td>
        <td>{{$dato->correo}}</td>
        <td>{{$dato->telefono}}</td>
        <td>{{$dato->curp}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
