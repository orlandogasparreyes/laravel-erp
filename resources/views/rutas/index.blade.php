@extends('layouts.plantilla')
@section('contenido')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Rutas De Distribución</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{route("ruta.create")}}" class="btn btn-sm btn-outline-primary">Agregar Ruta</a>
                <a href="#" class="btn btn-sm btn-outline-danger">...</a>
            </div>
        </div>
    </div>

    <div class="row">

        @foreach ($rutas as $r)
        <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Folio: {{$r->folio}}</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{$r->ruta}}</div>
                      <div class="text-xs font-weight-bold text-gray text-uppercase mb-1">Camion: {{$r->modelo}}</div>
                      <div class="text-xs font-weight-bold text-gray text-uppercase mb-1">Empleado: {{$r->nombre}}</div>
                      <div class="text-xs font-weight-bold text-gray text-uppercase mb-1"><a href="{{route("envio.show",$r->id)}}">Consultar</a></div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-map-marked-alt fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        @endforeach
    </div>
    <div>
            {{ $rutas->links("layouts.bootstrap-4") }}
    </div>
@endsection