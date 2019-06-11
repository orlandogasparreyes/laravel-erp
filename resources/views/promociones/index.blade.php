@extends('layouts.plantilla')
@section('contenido')
<style>
    .bg-purple {
        background-image:linear-gradient(to right, #4E25C1, #9144F4);
    }
    .lh-125 {
        line-height: 2.0;
    }
</style>

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Campaña De Correos</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{route("promocion.create")}}" class="btn btn-sm btn-outline-primary">Agregar Correo</a>
            </div>
        </div>
    </div>

    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
        <img class="mr-3" src="{{ asset('vendor/img/iconMark.svg') }}" alt="" width="48" height="48">
        <div class="lh-100">
            <h6 class="mb-0 text-white lh-100">Campañas De Marketing</h6>
            <small>Since 2011</small>
        </div>
    </div>

    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">Campañas Recientes</h6>
        @foreach ($promociones as $p)
        <div class="media text-muted pt-3">
            <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32">
                <title>{{$p->titulo}}</title>
                <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff"
                    dy=".3em">32x32</text>
            </svg>
            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                <strong class="d-block text-gray-dark">{{$p->titulo}} <span class="badge badge-{{$p->estado}}">
                        @if ($p->estado==="primary")
                        En Curso
                        @else
                        Finalizada
                        @endif
                    </span></strong>
                {{$p->descripcion}}
            </p>
        <a href="{{route('promocion.email',$p->id)}}" class="btn btn-light"><img width="24px" height="24px"
                    src="{{ asset('vendor/img/edit.svg') }}" />Enviar</a>
        </div>

        @endforeach

        <small class="d-block text-right mt-3">
            {{ $promociones->links("layouts.bootstrap-4") }}
        </small>
    </div>

@endsection