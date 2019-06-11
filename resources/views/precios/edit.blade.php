@extends('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-8 shadow-sm">
            <h2>Modificar Precio Actual</h2>
            <form class="" method="POST" action="{{ route('precio.update',$precio->id) }}">
                    {{ csrf_field() }} 
                {!! method_field("PUT") !!}
                <div class="form-row">
                    <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }} col-md-9">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $precio->descripcion }}" required autofocus>
                    
                        @if ($errors->has('nombre'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>

                    @endif
                    </div>
                    <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }} col-md-3" >
                        <label for="precio">Precio Nuevo</label>
                        <input type="text" class="form-control" id="precio" name="precio" value="{{ $precio->precio_kg }}" required autofocus>
                        @if ($errors->has('nombre'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </div>
                
            </form>
        </div>

        <div class="col-4">
                <object data="{{ asset('vendor/img/update_price.svg') }}" width="100%" type="image/svg+xml">
                    <!-- Imagen alternativa si el SVG no puede cargarse -->
                  </object>
        </div>
    </div>


@endsection