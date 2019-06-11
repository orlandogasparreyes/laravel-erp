@extends('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-8 shadow-sm">
            <h2>Editar Datos Camión</h2>
            <form class=""  action="{{ route('camion.index')  }}" >
                {{ csrf_field() }} 
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="modelo">Modelo</label>
                        <input type="text" class="form-control"  value="{{ $camion->modelo }}" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="matricula">Matricula</label>
                        <input type="text" class="form-control"  value="{{ $camion->matricula}}" disabled>

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="transmicion">Transmición</label>
                        <select id="transmicion" class="form-control" name="transmicion" disabled>
                            <option value="M">Transmición Manual</option>
                            <option value="A">Transmición Automatica</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="carga_max">Capacidad De Carga Máx.</label>
                        <input type="number" class="form-control" value="{{ $camion->carga_max }}" disabled>
                    </div>
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