@extends('layouts.plantilla')
@section('contenido')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Lista Empleados</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="{{route("empleado.create")}}" class="btn btn-sm btn-outline-primary">Agregar Empleado</a>
            <button type="button" class="btn btn-sm btn-outline-danger">PDF</button>
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
            <th scope="col">Nombre</th>
            <th scope="col">CURP</th>
            <th scope="col">RFC</th>
            <th scope="col">NSS</th>
            <th scope="col">Cargo</th>
            <th scope="col">Acciones</th>

        </tr>
    </thead>

    <tbody>
        <?php $x = 1; ?>
        @foreach ($empleados as $c)
        <tr>
            <th scope="row">{{ $x++ }}</th>
            <td><img src="{{ asset(Storage::url($c->image)) }}"
                    style="object-fit: cover;border-radius:50%; width: 45px;height: 45px;"> 
                 </td>
            <td>{{ $c->nombre }} {{$c->apellidos}}</td>
            <td >{{ $c->curp }}</td>
            <td >{{ $c->rfc }}</td>
            <td >{{ $c->nss }}</td>
            <td >{{ $c->cargos->cargo }}</td>
            <td>
                <div class="btn-group">
                    <button type="button" class="btn btn-sm  btn-outline-primary dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Acción
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('empleado.edit',$c->id) }}">Editar</a>
                        <a class="dropdown-item" href="{{ route('empleado.show',$c->id) }}">Detalles</a>
                        <form action="{{ route('empleado.destroy',$c->id) }}" method="POST">
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
{{ $empleados->links("layouts.bootstrap-4") }}
@endsection