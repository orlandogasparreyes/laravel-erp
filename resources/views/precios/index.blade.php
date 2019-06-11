@extends('layouts.plantilla')
@section('contenido')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Precio Actual Kg</h1>
    </div>

    <div class="row">
        <div class="col-8">
            @foreach ($precios as $p)
            <div class="card shadow-sm">
                <div class="card-header">
                    Precio Actual Por Kg
                </div>
                <div class="card-body">
                    <span class="badge badge-pill badge-primary"><strong>Precio: </strong></span>
                    {{$p->precio_kg}}<br>
                    <span class="badge badge-pill badge-danger"><strong>Descripción:
                        </strong></span>{{$p->descripcion}} <br>
                    <span class="badge badge-pill badge-warning"><strong>Fecha De Modificación:
                        </strong></span>{{$p->updated_at}} <br>
                    <br>
                    <a href="{{ route('precio.edit',$p->id) }}" class="btn btn-primary">Modificar</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-4">
            <object data="{{ asset('vendor/img/price.svg') }}" width="100%" type="image/svg+xml">
                <!-- Imagen alternativa si el SVG no puede cargarse -->
            </object>
        </div>
    </div>
@endsection