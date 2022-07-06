<table class="table" border='1'>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Numero</th>
        <th scope="col">Año</th>
        <th scope="col">Región</th>
        <th scope="col">Sala</th>
        <th scope="col">Ponencia</th>
        <th scope="col">Actor</th>
      </tr>
    </thead>
    <tbody>
        @foreach($datos as $obj)
      <tr>
        <th scope="row">{{$obj->id}}</th>
        <td>{{$obj->numero}}</td>
        <td>{{$obj->ano}}</td>
        <td>{{$obj->region->nombre}}</td>
        <td>{{$obj->sala}}</td>
        <td>{{$obj->ponencia}}</td>
        <td>{{$obj->actor->nombre}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
