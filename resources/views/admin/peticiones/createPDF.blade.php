<table class="table" border='1'>
    <thead>
      <tr>
        <th style="text-align:center"  scope="col">Nombre</th>
        <th style="text-align:center"  scope="col">Fecha Agregado</th>
      </tr>
    </thead>
    <tbody>
        @foreach($datos as $dato)
      <tr>
        <td style="text-align:center" >{{$dato->lugar}}</td>
        <td style="text-align:center" >{{$dato->created_at}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
