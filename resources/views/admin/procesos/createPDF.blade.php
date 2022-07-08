<table class="table" border='1'>
    <thead>
      <tr>
        <th style="text-align:center" scope="col">No. de Expediente</th>
        <th style="text-align:center" scope="col">Fecha de Ingreso</th>
        <th style="text-align:center" scope="col">Numero de Oficio</th>
        <th style="text-align:center" scope="col">Quien Recibió</th>
      </tr>
    </thead>
    <tbody>
        @foreach($datos as $dato)
      <tr>
        <td style="text-align:center" >{{$dato->numero_expediente}}</td>
        <td style="text-align:center" >{{$dato->fecha_de_ingreso}}</td>
        <td style="text-align:center" >{{$dato->numero_de_oficio}}</td>
        <td style="text-align:center" >{{$dato->quien_recibio}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
