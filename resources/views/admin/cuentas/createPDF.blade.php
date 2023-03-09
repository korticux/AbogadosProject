<table class="table" border='1'>
    <thead>
      <tr>
        <th style="text-align:center"  scope="col">Banco</th>
        <th  style="text-align:center" scope="col">Cuenta</th>
      </tr>
    </thead>
    <tbody>
        @foreach($datos as $dato)
      <tr>
        <td style="text-align:center" >{{$dato->banco}}</td>
        <td style="text-align:center" >{{$dato->cuenta}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
