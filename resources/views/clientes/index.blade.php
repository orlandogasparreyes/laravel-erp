@extends('layouts.plantilla')
@section('contenido')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Lista Clientes</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">

            <a href="{{route("cliente.create")}}" class="btn btn-sm btn-outline-primary">Agregar Cliente</a>
            <a href="{{route("cliente.excel")}}" class="btn btn-sm btn-outline-success"><i
                    class="fas fa-file-excel"></i>
                <span>Exportar</span></a>
        </div>
    </div>
</div>
<div>
    @if (session('msj'))
    <div class="alert alert-primary" role="alert">
        {{session('msj')}}
    </div>
    @endif
</div>

<table class="table table-hover shadow-sm">
    <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Cliente</th>
            <th scope="col">Telefono</th>
            <th scope="col">Celular</th>
            <th scope="col">E-mail</th>
            <th scope="col">C.P</th>
            <th scope="col">RFC</th>
            <th scope="col">Tipo</th>
            <th scope="col">Acciones</th>

        </tr>
    </thead>

    <tbody>
        <?php $x = 1; ?>
        @foreach ($clientes as $c)
        <tr>
            <th scope="row">{{ $x++ }}</th>
            <td><img src="{{ asset(Storage::url($c->image)) }}"
                    style="object-fit: cover;border-radius:50%; width: 45px;height: 45px;"> {{ $c->nombre }}</td>
            <td class="align-middle">{{ $c->telfijo }}</td>
            <td class="align-middle">{{ $c->telmovil }}</td>
            <td class="align-middle">{{ $c->email }}</td>
            <td class="align-middle">{{ $c->cpostal }}</td>
            <td class="align-middle">{{ $c->rfc }}</td>
            @if ($c->tipo=='F')
            <td class="align-middle"> <span class="badge badge-pill badge-primary">Fisica</span></td>
            @else
            <td class="align-middle"> <span class="badge badge-pill badge-success">Moral</span></td>
            @endif
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-sm  btn-outline-primary dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Acción
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('cliente.edit',$c->id) }}">Editar</a>
                        <a class="dropdown-item" href="{{ route('cliente.show',$c->id) }}">Detalles</a>
                        <form action="{{ route("cliente.destroy",$c->id) }}" method="POST">
                            {{ csrf_field() }}{!! method_field("DELETE") !!}
                            <button type="submit" class="dropdown-item">Eliminar</button>
                        </form>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $clientes->links("layouts.bootstrap-4") }}
@endsection