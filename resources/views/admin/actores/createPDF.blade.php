<table class="table" border='1'>
    <thead>
      <tr>
        <th style="text-align:center"  scope="col"># De Cliente</th>
        <th style="text-align:center"  scope="col">Nombre</th>
        <th  style="text-align:center" scope="col">Correo</th>
        <th style="text-align:center"  scope="col">Telefono</th>
        <th style="text-align:center"  scope="col">CURP</th>
      </tr>
    </thead>
    <tbody>
        @foreach($datos as $dato)
      <tr>
        <td style="text-align:center" >{{$dato->nocliente}}</td>
        <td style="text-align:center" >{{$dato->nombre}}</td>
        <td style="text-align:center" >{{$dato->correo}}</td>
        <td style="text-align:center" >{{$dato->telefono}}</td>
        <td style="text-align:center" >{{$dato->curp}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
