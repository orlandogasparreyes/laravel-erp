@extends('layouts.plantilla')
@section('contenido')
    <div class="row">
        <div class="col-9 shadow-sm">
            <h2>Nuevo Paquete</h2>
            <form  class="" method="POST" action="{{ route('paquete.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group{{$errors->has('descripcion') ? 'has-error' : ''}} col-md-5">
                        <label for="descripcion">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion"
                            value="{{ old('descripcion') }}" placeholder="Descricion">
                        @if ($errors->has('descripcion'))

                        <span class="help-block">
                            <strong>{{$errors->first('descripcion')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('dimensiones') ? 'has-error' : ''}} col-md-4">
                        <label for="dimensiones">Dimensiones (cm)</label>
                        <input type="text" class="form-control" id="dimensiones" name="dimensiones"
                            value="{{ old('dimensiones') }}" placeholder="Largo* Ancho* Alto*">
                        @if ($errors->has('dimensiones'))
                        <span class="help-block">
                            <strong>{{$errors->first('dimensiones')}}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{$errors->has('peso') ? 'has-error' : ''}} col-md-3">
                        <label for="peso">Peso Kg</label>
                        <input type="number"  step="0.1" min="1" class="form-control" id="peso" name="peso"
                            value="{{ old('peso') }}" placeholder="Kg">
                        @if ($errors->has('peso'))

                        <span class="help-block">
                            <strong>{{$errors->first('peso')}}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group{{$errors->has('destinatario') ? 'has-error' : ''}} col-md-6">
                        <label for="destinatario">Nombre Destinatario</label>
                        <input type="text" class="form-control" id="destinatario" name="destinatario"
                            value="{{ old('destinatario') }}" placeholder="Nombre Destinatario">
                        @if ($errors->has('destinatario'))
                        <span class="help-block">
                            <strong>{{$errors->first('destinatario')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('direccion_dest') ? 'has-error' : ''}} col-md-6">
                        <label for="direccion_dest">Dirección Destinatario</label>
                        <input type="text" class="form-control" id="direccion_dest" name="direccion_dest"
                            value="{{ old('direccion_dest') }}" placeholder="Direccion Destinatario">
                        @if ($errors->has('direccion_dest'))
                        <span class="help-block">
                            <strong>{{$errors->first('direccion_dest')}}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group{{$errors->has('telf_destino') ? 'has-error' : ''}} col-md-6">
                        <label for="telf_destino">Telefono De Referencia</label>
                        <input type="number" class="form-control" id="telf_destino" name="telf_destino"
                            value="{{ old('telf_destino') }}">
                        @if ($errors->has('telf_destino'))
                        <span class="help-block">
                            <strong>{{$errors->first('telf_destino')}}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('cliente') ? ' has-error' : '' }} col-md-6">
                        <label for="nombre">cliente</label>
                        <select class="form-control" name="cliente" id="cliente">
                            <option selected>Seleccione Un Cliente </option>
                            @foreach ($clientes as $c)
                            <option value="{{$c->id}}">{{$c->nombre}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('cliente'))
                        <span class="help-block">
                            <strong>{{$errors->first('cliente')}}</strong>
                        </span>
                        @endif
                    </div>

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </form>
        </div>
        <div class="col-3">
            <img width="100%" src="{{ asset('vendor/img/addPaquete.svg') }}" />
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            @if(old("cliente")!="")
                $("#cliente").val('{{old("cliente")}}');
            @endif
        });
    </script>
@endsection