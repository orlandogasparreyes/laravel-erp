@extends('layouts.plantilla')
@section('contenido')
<br>

    <div class="row">
        <div class="col-8 shadow-sm">
            <h2>Nueva Ruta De Distribución</h2>
            <form class="" method="POST" action="{{ route('ruta.store') }}">
                {{ csrf_field() }}
                <div class="form-group{{$errors->has('folio') ? 'has-error' : ''}}">
                    <label for="folio">Folio</label>
                    <input type="text" class="form-control" id="folio" name="folio" value="{{ old('folio') }}"
                        placeholder="Registrar Folio">
                    @if ($errors->has('folio'))
                    <span class="help-block">
                        <strong>{{$errors->first('folio')}}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('ruta') ? ' has-error' : '' }}">
                        <label for="ruta">Ruta</label>
                        <input type="text" class="form-control" id="ruta" name="ruta" value="{{ old('ruta') }}"
                            placeholder="Registrar Ruta">
                        @if ($errors->has('ruta'))
                        <span class="help-block">
                            <strong>{{$errors->first('ruta')}}</strong>
                        </span>
                        @endif

                    </div>

                <div class="form-row">
                    <div class="form-group{{ $errors->has('camion') ? ' has-error' : '' }} col-md-6">
                        <label for="nombre">Unidad De Carga</label>
                        <select class="form-control" name="camion" id="camion">
                            <option selected>Seleccione Una Unidad </option>
                            @foreach ($camiones as $u)
                            <option value="{{$u->id}}">{{$u->modelo}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('camion'))
                        <span class="help-block">
                            <strong>{{$errors->first('camion')}}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('empleado') ? ' has-error' : '' }}  col-md-6">
                        <label for="nombre">Conductor De La Unidad</label>
                        <select class="form-control" name="empleado" id="empleado">
                            <option selected>Seleccione Un Conductor</option>
                            @foreach ($empleados as $u)
                            <option value="{{$u->id}}">{{$u->nombre}} {{$u->apellidos}} </option>
                            @endforeach
                        </select>
                        @if ($errors->has('empleado'))
                        <span class="help-block">
                            <strong>{{$errors->first('empleado')}}</strong>
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
            <object data="{{ asset('vendor/img/mapSend.svg') }}" width="100%" type="image/svg+xml">
                <!-- Imagen alternativa si el SVG no puede cargarse -->
            </object>
        </div>
    </div>
@endsection