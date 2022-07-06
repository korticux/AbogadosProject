<table class="table" border='1'>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Expediente</th>
        <th scope="col">Situacion</th>
        <th scope="col">Fecha</th>
        <th scope="col">Comentario</th>
        <th scope="col">Fecha Agregado</th>
      </tr>
    </thead>
    <tbody>
        @foreach($datos as $dato)
      <tr>
        <th scope="row">{{$dato->id}}</th>
        <td>{{$dato->expediente}}</td>
        <td>{{$dato->situacion}}</td>
        <td>{{$dato->fecha}}</td>
        <td>{{$dato->comentario}}</td>
        <td>{{$dato->created_at}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
