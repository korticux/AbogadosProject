<table class="table" border='1'>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Banco</th>
        <th scope="col">Cuenta</th>
      </tr>
    </thead>
    <tbody>
        @foreach($datos as $dato)
      <tr>
        <th scope="row">{{$dato->id}}</th>
        <td>{{$dato->banco}}</td>
        <td>{{$dato->cuenta}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
