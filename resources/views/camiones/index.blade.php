@extends('layouts.plantilla')
@section('contenido')
<style>
    .status {
        font-size: 30px;
        margin: 2px 2px 0 0;
        display: inline-block;
        vertical-align: middle;
        line-height: 5px;
    }

    .text-success {
        color: #10c469;
    }

    .text-danger {
        color: #ff5b5b;
    }
</style>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Flota De Camiones</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="{{ route("camion.create")}}" class="btn btn-sm btn-outline-primary">Agregar Camión</a>
            <a href="#" class="btn btn-sm btn-outline-danger">...</a>
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
            <th scope="col">Perfil</th>
            <th scope="col">Modelo</th>
            <th scope="col">Matricula</th>
            <th scope="col">Carga Max</th>
            <th scope="col">Transmición</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php $x = 1; ?>
        @foreach ($camiones as $c)
        <tr>
            <th scope="row">{{ $x++ }}</th>
            <td>
                @if ($c->image!=null)
                <img src="{{ asset(Storage::url($c->image)) }}"
                    style="object-fit: cover;border-radius:50%; width: 45px;height: 45px;">
                @else
                <img src="{{ asset('vendor/img/profile.png') }}"
                    style="object-fit: cover;border-radius:50%; width: 45px;height: 45px;">
                @endif

            </td>
            <td>{{ $c->modelo }}</td>
            <td>{{ $c->matricula }}</td>
            <td>{{ $c->carga_max }} Kg</td>
            @if ($c->transmicion=='M')
            <td><span class="status text-success">&bull;</span> Manual </td>
            @else
            <td><span class="status text-danger">&bull;</span> Automatica </td>
            @endif
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-sm  btn-outline-primary dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Acción
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('camion.edit',$c->id) }}">Editar</a>
                    <a class="dropdown-item" href="{{ route('camion.show',$c->id) }}">Detalles</a>
                        <form action="{{ route("camion.destroy",$c->id) }}" method="POST">
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
{{ $camiones->links("layouts.bootstrap-4") }}
@endsection