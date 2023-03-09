<table class="table" border='1'>
    <thead>
      <tr>
        <th style="text-align:center"  scope="col">Cobranza</th>
        <th style="text-align:center"  scope="col">Tipo</th>
        <th style="text-align:center"  scope="col">Fecha</th>
        <th style="text-align:center"  scope="col">Monto</th>
      </tr>
    </thead>
    <tbody>
        @foreach($datos as $dato)
      <tr>
        <td style="text-align:center" >{{$dato->cobranza}}</td>
        <td style="text-align:center" >{{$dato->tipo}}</td>
        <td style="text-align:center" >{{$dato->fecha}}</td>
        <td style="text-align:center" >{{$dato->monto}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
