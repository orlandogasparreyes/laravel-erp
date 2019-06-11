@extends('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-8 shadow-sm ">
            <h2>Editar Datos Cliente</h2>
            <form class="" method="POST" action="{{ route('cliente.update',$cliente->id) }}"
                enctype="multipart/form-data">
                {{ csrf_field() }} {!! method_field("PUT") !!}
                <div class="form-row">
                    <div class="form-group{{$errors->has('nombre') ? 'has-error' : ''}} col-md-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$cliente->nombre }}"
                            placeholder="Nombre Cliente">
                        @if ($errors->has('nombre'))
                        <span class="help-block">
                            <strong>{{$errors->first('nombre')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('correo') ? 'has-error' : ''}} col-md-6">
                        <label for="correo">E-mail</label>
                        <input type="email" class="form-control" id="correo" name="correo" value="{{ $cliente->email}}"
                            placeholder="E-mail">
                        @if ($errors->has('correo'))
                        <span class="help-block">
                            <strong>{{$errors->first('correo')}}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{$errors->has('direccion') ? 'has-error' : ''}}">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion"
                        value="{{ $cliente->domicilio}}" placeholder="Colonia Calle">
                    @if ($errors->has('direccion'))
                    <span class="help-block">
                        <strong>{{$errors->first('direccion')}}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-row">
                    <div class="form-group{{$errors->has('telfijo') ? 'has-error' : ''}} col-md-6">
                        <label for="telfijo">Telefono 1</label>
                        <input type="number" class="form-control" id="telfijo" name="telfijo"
                            value="{{ $cliente->telfijo }}" placeholder="Telefono Fijo">
                        @if ($errors->has('telfijo'))
                        <span class="help-block">
                            <strong>{{$errors->first('telfijo')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('telmovil') ? 'has-error' : ''}} col-md-6">
                        <label for="telmovil">Telefono 2</label>
                        <input type="number" class="form-control" id="telmovil" name="telmovil"
                            value="{{ $cliente->telmovil }}" placeholder="Telefono Celular">
                        @if ($errors->has('telmovil'))
                        <span class="help-block">
                            <strong>{{$errors->first('telmovil')}}</strong>
                        </span>
                        @endif
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group{{$errors->has('tipoC') ? 'has-error' : ''}} col-md-3">
                        <label for="tipoC">Tipo De Persona</label>
                        <select id="tipoC" class="form-control" name="tipoC">
                            <option value="F">Persona Física</option>
                            <option value="M">Persona Moral</option>
                        </select>
                    </div>
                    @if ($errors->has('tipoC'))
                    <span class="help-block">
                        <strong>{{$errors->first('tipoC')}}</strong>
                    </span>
                    @endif
                    <div class="form-group{{$errors->has('rfc') ? 'has-error' : ''}} col-md-6">
                        <label for="rfc">RFC</label>
                        <input type="text" class="form-control" id="rfc" name="rfc" value="{{ $cliente->rfc }}">
                        @if ($errors->has('rfc'))
                        <span class="help-block">
                            <strong>{{$errors->first('rfc')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('cpostal') ? 'has-error' : ''}} col-md-3">
                        <label for="cpostal">C.P</label>
                        <input type="number" class="form-control" id="cpostal" name="cpostal"
                            value="{{ $cliente->cpostal }}" placeholder="Código Postal">
                        @if ($errors->has('cpostal'))
                        <span class="help-block">
                            <strong>{{$errors->first('cpostal')}}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{$errors->has('image') ? 'has-error' : ''}}">
                    <label for="image">Seleccionar Imagen De Perfil</label>
                    <input type="file" class="form-control-file" id="image" name="image" value="{{ old('image') }}">
                    @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{$errors->first('image')}}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Confirmar Cambios</button>
                </div>
            </form>
        </div>
        <div class="col-4">
            <div class="text-center">
                <img src="{{ asset(Storage::url($cliente->image)) }}"
                    style="object-fit: cover;border-radius:50%; width: 300px;height: 300px;">
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $("#tipoC").val('{{ $cliente->tipo }}');
    });
</script>
@endsection