<table class="table" border='1'>
    <thead>
      <tr>
        <th style="text-align:center"  scope="col">Numero</th>
        <th style="text-align:center"  scope="col">Nombre</th>
      </tr>
    </thead>
    <tbody>
        @foreach($datos as $dato)
      <tr>
        <td  style="text-align:center"  >{{$dato->numero}}</td>
        <td style="text-align:center" >{{$dato->nombre}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
