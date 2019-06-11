@extends('layouts.plantilla')
@section('contenido')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Lista Envios</h1>
</div>

<table class="table table-hover shadow-sm">
    <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Paquetes</th>
            <th scope="col">Hora De Registro</th>
        </tr>
    </thead>

    <tbody>
        <?php $x = 1; ?>
      @foreach ($envios as $e)
          <tr>
              <th scope="row">{{ $x++ }}</th>
              <td class="align-middle">{{ $e->paquete }}</td>
              <td class="align-middle">{{ $e->created_at }}</td>
          </tr>
      @endforeach

    </tbody>
</table>

@endsection