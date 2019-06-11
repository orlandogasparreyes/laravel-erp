@extends('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-8 shadow-sm">
            <h2>Nueva Campaña</h2>
            <form class="" method="POST" action="{{ route('promocion.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group{{$errors->has('titulo') ? 'has-error' : ''}}">
                    <label for="titulo">Titulo De Campaña</label>
                    <input type="text" class="form-control" id="titulo" name="titulo"  value="{{ old('titulo') }}" placeholder="Nombre De La Campaña">
                    @if ($errors->has('titulo'))
                    <span class="help-block">
                        <strong>{{$errors->first('titulo')}}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group{{$errors->has('descripcion') ? 'has-error' : ''}}">
                    <label for="descripcion">Descripción De La Campaña</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" aria-label="With textarea">{{ old('descripcion') }}</textarea>
                    @if ($errors->has('descripcion'))
                    <span class="help-block">
                        <strong>{{$errors->first('descripcion')}}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-row">
                    <div class="form-group{{$errors->has('fecha_ini') ? 'has-error' : ''}} col-md-6">
                        <label for="fecha_ini">Fecha Inicio</label>
                        <input type="date" class="form-control" id="fecha_ini" name="fecha_ini" value="{{ old('fecha_ini') }}" min="2019-01-01" max="2020-12-31">
                        @if ($errors->has('fecha_ini'))
                        <span class="help-block">
                            <strong>{{$errors->first('fecha_ini')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('fecha_fin') ? 'has-error' : ''}} col-md-6">
                        <label for="fecha_fin">Fecha Final </label>
                        <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="{{ old('fecha_fin') }}" min="2019-01-01" max="2020-12-31">
                        @if ($errors->has('fecha_fin'))
                        <span class="help-block">
                            <strong>{{$errors->first('fecha_fin')}}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{$errors->has('image') ? 'has-error' : ''}} ">
                        <label for="image">Seleccionar Imagen</label>
                        <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
                        @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{$errors->first('image')}}</strong>
                        </span>
                        @endif
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </form>
        </div>
        <div class="col-4">
                <object data="{{ asset('vendor/img/addPromocion.svg') }}" width="100%" type="image/svg+xml">
                    <!-- Imagen alternativa si el SVG no puede cargarse -->
                  </object>
        </div>
    </div>

@endsection