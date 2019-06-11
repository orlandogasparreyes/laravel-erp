@extends('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-8 shadow-sm">
            <h2>Editar Datos Camión</h2>
            <form class="" method="POST" action="{{ route('camion.update',$camion->id)  }}" enctype="multipart/form-data">
                {{ csrf_field() }} {!! method_field("PUT") !!}
                <div class="form-row">
                    <div class="form-group{{$errors->has('modelo') ? 'has-error' : ''}} col-md-6">
                        <label for="modelo">Modelo</label>
                        <input type="text" class="form-control" id="modelo" name="modelo" value="{{ $camion->modelo }}" placeholder="Modelo">
                        @if ($errors->has('modelo'))
                        <span class="help-block">
                            <strong>{{$errors->first('modelo')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('matricula') ? 'has-error' : ''}} col-md-6">
                        <label for="matricula">Matricula</label>
                        <input type="text" class="form-control" id="matricula" name="matricula" value="{{ $camion->matricula}}" placeholder="Matricula Transporte">
                        @if ($errors->has('matricula'))
                        <span class="help-block">
                            <strong>{{$errors->first('matricula')}}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group{{$errors->has('transmicion') ? 'has-error' : ''}} col-md-6">
                        <label for="transmicion">Transmición</label>
                        <select id="transmicion" class="form-control" name="transmicion">
                            <option value="M">Transmición Manual</option>
                            <option value="A">Transmición Automatica</option>
                        </select>
                    </div>
                    @if ($errors->has('transmicion'))
                    <span class="help-block">
                        <strong>{{$errors->first('transmicion')}}</strong>
                    </span>
                    @endif
                    <div class="form-group{{$errors->has('carga_max') ? 'has-error' : ''}} col-md-6">
                        <label for="carga_max">Capacidad De Carga Máx.</label>
                        <input type="number" class="form-control" id="carga_max" name="carga_max" value="{{ $camion->carga_max }}" placeholder="Capacidad De Carga Max. Kg">
                        @if ($errors->has('carga_max'))
                        <span class="help-block">
                            <strong>{{$errors->first('carga_max')}}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{$errors->has('image') ? 'has-error' : ''}}">
                    <label for="image">Cargar Imagen</label>
                    <input type="file" class="form-control-file" id="image" name="image" value="{{ old('image') }}">
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
                <img src="{{ asset(Storage::url($camion->image)) }}"
                    style="object-fit: cover;border-radius:50%; width: 300px;height: 300px;">
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $("#transmicion").val('{{ $camion->transmicion }}');
    });
</script>
@endsection