<table class="table" border='1'>
    <thead>
      <tr>
        <th style="text-align:center" scope="col">Expediente</th>
        <th style="text-align:center" scope="col">Situacion</th>
        <th style="text-align:center" scope="col">Fecha</th>
        <th style="text-align:center" scope="col">Comentario</th>
        <th style="text-align:center" scope="col">Fecha Agregado</th>
      </tr>
    </thead>
    <tbody>
        @foreach($datos as $dato)
      <tr>
        <td style="text-align:center">{{$dato->expediente}}</td>
        <td style="text-align:center">{{$dato->situacion}}</td>
        <td style="text-align:center">{{$dato->fecha}}</td>
        <td style="text-align:center">{{$dato->comentario}}</td>
        <td style="text-align:center">{{$dato->created_at}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
