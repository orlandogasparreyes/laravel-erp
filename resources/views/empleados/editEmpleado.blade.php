@extends('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-8 shadow-sm">
            <h2>Editar Datos Empleado</h2>
            <form class="" method="POST" action="{{ route('empleado.update',$empleado->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }} {!! method_field("PUT") !!}
                <div class="form-row">
                    <div class="form-group{{$errors->has('nombre') ? 'has-error' : ''}} col-md-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $empleado->nombre}}"
                            placeholder="Nombre">
                        @if ($errors->has('nombre'))
                        <span class="help-block">
                            <strong>{{$errors->first('nombre')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('apellidos') ? 'has-error' : ''}} col-md-6">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos"
                            value="{{ $empleado->apellidos}}" placeholder="Apellidos">
                        @if ($errors->has('apellidos'))
                        <span class="help-block">
                            <strong>{{$errors->first('apellidos')}}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{$errors->has('domicilio') ? 'has-error' : ''}}">
                    <label for="domicilio">Domicilio</label>
                    <input type="text" class="form-control" id="domicilio" name="domicilio"
                        value="{{ $empleado->domicilio }}" placeholder="Colonia Calle">
                    @if ($errors->has('domicilio'))
                    <span class="help-block">
                        <strong>{{$errors->first('domicilio')}}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-row">
                    <div class="form-group{{$errors->has('curp') ? 'has-error' : ''}} col-md-6">
                        <label for="curp">CURP</label>
                        <input type="text" class="form-control" id="curp" name="curp" value="{{ $empleado->curp }}"
                            placeholder="CURP">
                        @if ($errors->has('curp'))
                        <span class="help-block">
                            <strong>{{$errors->first('curp')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('rfc') ? 'has-error' : ''}} col-md-6">
                        <label for="rfc">RFC</label>
                        <input type="text" class="form-control" id="rfc" name="rfc" value="{{ $empleado->rfc}}"
                            placeholder="RFC">
                        @if ($errors->has('rfc'))
                        <span class="help-block">
                            <strong>{{$errors->first('rfc')}}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group{{$errors->has('nss') ? 'has-error' : ''}} col-md-6">
                        <label for="nss">Número De Seguro Social</label>
                        <input type="number" class="form-control" id="nss" name="nss" value="{{ $empleado->nss }}"
                            placeholder="DNI Seguro Social">
                        @if ($errors->has('nss'))
                        <span class="help-block">
                            <strong>{{$errors->first('nss')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('num_cuenta') ? 'has-error' : ''}} col-md-6">
                        <label for="num_cuenta">Número De Cuenta Bancaria</label>
                        <input type="number" class="form-control" id="num_cuenta" name="num_cuenta"
                            value="{{ $empleado->num_cuenta }}" placeholder="Cuenta Bancaria">
                        @if ($errors->has('num_cuenta'))
                        <span class="help-block">
                            <strong>{{$errors->first('num_cuenta')}}</strong>
                        </span>
                        @endif
                    </div>

                </div>

                <div class="form-group{{ $errors->has('cargo') ? ' has-error' : '' }}">
                    <label for="nombre">cargo</label>
                    <select class="form-control" name="cargo" id="cargo">
                        @foreach ($cargos as $u)
                        <option value="{{$u->id}}">{{$u->cargo}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('cargo'))
                    <span class="help-block">
                        <strong>{{$errors->first('cargo')}}</strong>
                    </span>
                    @endif
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
                <div class="text-center">
                        <img src="{{ asset(Storage::url($empleado->image)) }}"
                            style="object-fit: cover;border-radius:50%; width: 300px;height: 300px;">
                    </div>
        </div>
    </div>
@endsection

@section('script')
@if($empleado != null)
<script>
    $(document).ready(function () {
        $("#cargo").val('{{$empleado->cargo}}');
    });
</script>
@endif
@endsection