<table class="table" border='1'>
    <thead>
      <tr>
        <th  style="text-align:center" scope="col">Numero</th>
        <th style="text-align:center"  scope="col">Año</th>
        <th  style="text-align:center" scope="col">Región</th>
        <th style="text-align:center"  scope="col">Sala</th>
        <th  style="text-align:center" scope="col">Ponencia</th>
        <th style="text-align:center"  scope="col">Actor</th>
      </tr>
    </thead>
    <tbody>
        @foreach($datos as $obj)
      <tr>
        <td style="text-align:center" >{{$obj->numero}}</td>
        <td style="text-align:center" >{{$obj->ano}}</td>
        <td style="text-align:center" >{{$obj->region->nombre}}</td>
        <td style="text-align:center" >{{$obj->sala}}</td>
        <td style="text-align:center" >{{$obj->ponencia}}</td>
        <td style="text-align:center" >{{$obj->actor->nombre}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
