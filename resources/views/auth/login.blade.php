@extends('layouts.login')

@section('content')

<div class="container">
    <div style="width: 100%;height: 100px">
    </div>
    <div class="row">
        <div class="col-md-7 col-center">
            <div class="panel panel-default panel-login">
                <div class="panel-body" style="padding: 0">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        <div class="row">
                            <div class="col-md-5" style="padding-left:0;padding-top: 0">
                                <img src="/img/login.png" width="90%" >
                            </div>
                            <div class="col-md-7">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-lg-10 text-right" style="color:#005d96"><h3>Login</h3></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="titles">Correo</label>
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                            @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="email" class="titles">Clave</label>
                                            <input id="password" type="password" class="form-control" name="password" required>
                                            @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Recordarme
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary btn-login">
                                            Ingresar
                                        </button>

                                        <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                            Olvidate tu clave?
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
