<table class="table" border='1'>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Fecha Agregado</th>
      </tr>
    </thead>
    <tbody>
        @foreach($datos as $dato)
      <tr>
        <th scope="row">{{$dato->id}}</th>
        <td>{{$dato->Nombre}}</td>
        <td>{{$dato->created_at}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
