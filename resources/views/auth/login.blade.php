<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mini Super Cynthi</title>
    <link rel="stylesheet" type="text/css" href="{{url("assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css")}}"/>
    <link rel="stylesheet" type="text/css" href="{{url("assets/lib/material-design-icons/css/material-design-iconic-font.min.css")}}"/><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{url("assets/css/style.css")}}" type="text/css"/>
</head>
<body class="be-splash-screen">
<div class="be-wrapper be-login">
    <div class="be-content">
        <div class="main-content container-fluid">
            <div class="splash-container">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading"><img src="{{url("assets/img/logo-xx.png")}}" alt="logo" width="102" height="27" class="logo-img"><span class="splash-description">Por favor llena los campos.</span></div>
                    <div class="panel-body">
                        <form  method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input id="username" name="email" type="email" placeholder="Correo electronico" autocomplete="on" class="form-control">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="password" name="password" type="password" placeholder="Contraseña" class="form-control">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row login-tools">
                                <div class="col-xs-6 login-remember">
                                    <div class="be-checkbox">
                                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember">Recordarme</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 login-forgot-password"><a href="{{ route('password.request') }}">¿Olvidaste tú contraseña?</a></div>
                            </div>
                            <div class="form-group login-submit">
                                <button data-dismiss="modal" type="submit" class="btn btn-primary btn-xl">Iniciar sesión</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="splash-footer"><span>¿No tienes una cuenta? <a href="{{ route('register') }}">Crear cuenta</a></span></div>
            </div>
        </div>
    </div>
</div>
<script src="{{url("assets/lib/jquery/jquery.min.js")}}" type="text/javascript"></script>
<script src="{{url("assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js")}}" type="text/javascript"></script>
<script src="{{url("assets/js/main.js")}}" type="text/javascript"></script>
<script src="{{url("assets/lib/bootstrap/dist/js/bootstrap.min.js")}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        //initialize the javascript
        App.init();
    });

</script>
</body>
</html>






<?php
//@extends('layouts.app')

//@section('content')

        ?>

    <!--
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

-->


<?php

//@endsection
        ?>