<table class="table" border='1'>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Numero</th>
        <th scope="col">Año</th>
        <th scope="col">Región</th>
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
