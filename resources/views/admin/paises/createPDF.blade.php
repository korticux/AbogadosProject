<table class="table" border='1'>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Fecha</th>
      </tr>
    </thead>
    <tbody>
        @foreach($datos as $dato)
      <tr>
        <th scope="row">{{$dato->id}}</th>
        <td>{{$dato->nombre}}</td>
        <td>{{$dato->created_at}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
