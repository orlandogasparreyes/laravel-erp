@extends('layouts.plantilla')
@section('contenido')
@include('paquetes.modalEnvio')
<style>
    .bg-purple {
        background-image: linear-gradient(to right, #F8786F, #9144F4);
    }

    .lh-125 {
        line-height: 2.0;
    }
</style>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Lista Paquetes</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <a href="{{route("paquete.create")}}" class="btn btn-sm btn-outline-primary">Agregar Paquete</a>
            <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal"
                data-target="#exampleModal">Asignar Destino</button>
        </div>
    </div>
</div>

<div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
    <img class="mr-3" src="{{ asset('vendor/img/boxes.svg') }}" alt="" width="48" height="48">
    <div class="lh-100">
        <h6 class="mb-0 text-white lh-100">Entrada De Paquetes</h6>
        <small>Since 2011</small>
    </div>
</div>

<div class="my-3 p-3 bg-white rounded shadow-sm">
    <table class="table table-hover shadow-sm">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Paquete</th>
                <th scope="col">Dimensiones</th>
                <th scope="col">Destino</th>
                <th scope="col">Dirección Destino</th>
                <th scope="col">Telf. Referencia</th>
                <th scope="col">Peso (Kg)</th>
                <th scope="col">Costo De Envio</th>
                <th scope="col">Fecha De Ingreso</th>
            </tr>
        </thead>

        <tbody>
            <?php $x = 1; ?>
            @foreach ($paquetes as $p)
            <tr>
                <th scope="row">{{ $x++ }}</th>
                <td>{{$p->descripcion}}</td>
                <td>{{$p->dimensiones}}</td>
                <td>{{$p->destinatario}}</td>
                <td>{{$p->direccion_dest}}</td>
                <td>{{$p->telf_destino}}</td>
                <td>{{$p->peso}}</td>
                <td><strong>$</strong>{{$p->costo_envio}} <strong>Mxn</strong></td>
                <td>{{ date("d-m-Y",strtotime($p->created_at) )}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <small class="d-block text-right mt-3">
        {{ $paquetes->links("layouts.bootstrap-4") }}
    </small>
</div>


@endsection