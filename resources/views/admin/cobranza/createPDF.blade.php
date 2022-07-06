<table class="table" border='1'>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Cobranza</th>
        <th scope="col">Tipo</th>
        <th scope="col">Fecha</th>
        <th scope="col">Monto</th>
      </tr>
    </thead>
    <tbody>
        @foreach($datos as $dato)
      <tr>
        <th scope="row">{{$dato->id}}</th>
        <td>{{$dato->cobranza}}</td>
        <td>{{$dato->tipo}}</td>
        <td>{{$dato->fecha}}</td>
        <td>{{$dato->monto}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
