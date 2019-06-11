@extends('layouts.plantilla')
@section('contenido')
<div class="row">
    <div class="col-8 shadow-sm">
        <h2>Detalle Cliente</h2>
        <form class="" method="" action="{{ route('cliente.index') }}">
            {{ csrf_field() }} 
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" value="{{$cliente->nombre }}" disabled>
                </div>
                <div class="form-group col-md-6">
                    <label for="correo">E-mail</label>
                    <input type="email" class="form-control" value="{{ $cliente->email}}" disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" value="{{ $cliente->domicilio}}" disabled>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="telfijo">Telefono 1</label>
                    <input type="number" class="form-control" value="{{ $cliente->telfijo }}" disabled>

                </div>
                <div class="form-group col-md-6">
                    <label for="telmovil">Telefono 2</label>
                    <input type="number" class="form-control" value="{{ $cliente->telmovil }}" disabled>

                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="tipoC">Tipo De Persona</label>
                    <select id="tipoC" class="form-control" name="tipoC" disabled>
                        <option value="F">Persona Física</option>
                        <option value="M">Persona Moral</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="rfc">RFC</label>
                    <input type="text" class="form-control" value="{{ $cliente->rfc }}" disabled>

                </div>
                <div class="form-group col-md-3">
                    <label for="cpostal">C.P</label>
                    <input type="number" class="form-control" value="{{ $cliente->cpostal }}" disabled>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Regresar</button>
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