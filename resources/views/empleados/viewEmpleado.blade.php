@extends('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-8 shadow-sm">
            <h2>Detalle Empleado</h2>
            <form class="" action="{{ route('empleado.index') }}" >
                {{ csrf_field() }} 
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" value="{{ $empleado->nombre}}" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="apellidos">Apellidos</label>
                        <input type="text" class="form-control" value="{{ $empleado->apellidos}}" disabled>

                    </div>
                </div>

                <div class="form-group">
                    <label for="domicilio">Domicilio</label>
                    <input type="text" class="form-control" value="{{ $empleado->domicilio }}" disabled>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="curp">CURP</label>
                        <input type="text" class="form-control" value="{{ $empleado->curp }}" disabled>
            
                    </div>
                    <div class="form-group col-md-6">
                        <label for="rfc">RFC</label>
                        <input type="text" class="form-control"  value="{{ $empleado->rfc}}" disabled>
                   
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nss">Número De Seguro Social</label>
                        <input type="number" class="form-control"  value="{{ $empleado->nss }}" disabled>
                    
                    </div>
                    <div class="form-group col-md-6">
                        <label for="num_cuenta">Número De Cuenta Bancaria</label>
                        <input type="number" class="form-control"  value="{{ $empleado->num_cuenta }}" disabled>
                    </div>

                </div>

                <div class="form-group">
                    <label for="nombre">cargo</label>
                    <select class="form-control" name="cargo" id="cargo" disabled>
                        @foreach ($cargos as $u)
                        <option value="{{$u->id}}">{{$u->cargo}}</option>
                        @endforeach
                    </select>
                 
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