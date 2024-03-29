@extends('layouts.app')
@section('content')
<div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
    
          <div class="col-xl-10 col-lg-12 col-md-9">
    
            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                  <div class="col-lg-6">
                    <div class="p-5">
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Inicia Sesión</h1>
                      </div>
                      <form class="user" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          <input type="email" class="form-control form-control-user" id="email"
                            aria-describedby="emailHelp" placeholder="Ingrese E-mail..." name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword"
                            placeholder="Password">
                            @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                          <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="customCheck" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customCheck">Recordar Password</label>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">Iniciar</button>
                        <hr> 
                      </form>
                      <div class="text-center">
                        <a class="small" href="{{ route('register') }}">Crear Una Cuenta</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
          </div>
    
        </div>
    
      </div>
@endsection
