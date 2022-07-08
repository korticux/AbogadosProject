<table class="table" border='1'>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Numero</th>
        <th scope="col">Nombre</th>
      </tr>
    </thead>
    <tbody>
        @foreach($datos as $dato)
      <tr>
        <th scope="row">{{$dato->id}}</th>
        <td>{{$dato->numero}}</td>
        <td>{{$dato->nombre}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>