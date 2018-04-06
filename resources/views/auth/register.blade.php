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
    <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
</head>
<body class="be-splash-screen">
<div class="be-wrapper be-login be-signup">
    <div class="be-content">
        <div class="main-content container-fluid">
            <div class="splash-container sign-up">
                <div class="panel panel-default panel-border-color panel-border-color-primary">
                    <div class="panel-heading"><img src="{{url("assets/img/logo-xx.png")}}" alt="logo" width="102" height="27" class="logo-img"><span class="splash-description">Por favor llena los camposs</span></div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <span class="splash-title xs-pb-20">Registrarse</span>
                            <div class="form-group">
                                <input type="text" name="name" id="name" required placeholder="Nombre" autocomplete="off" class="form-control">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" required="" placeholder="Correo electronico" autocomplete="off" class="form-control">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row signup-password">
                                <div class="col-xs-6">
                                    <input id="password" name="password" type="password" required="" placeholder="Contraseña" class="form-control">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-xs-6">
                                    <input id="password_confirmation" type="password" name="password_confirmation" required="" placeholder="Confirmar contraseña" class="form-control">
                                </div>
                            </div>
                            <div class="form-group xs-pt-10">
                                <button type="submit" class="btn btn-block btn-primary btn-xl">Registrarse</button>
                            </div>
                            <div class="title"><span class="splash-title xs-pb-15">O</span></div>
                            <div class="form-group row social-signup">
                                <div class="col-xs-6">
                                    <button type="button" class="btn btn-lg btn-block btn-social btn-facebook btn-color"><i class="mdi mdi-facebook icon icon-left"></i> Facebook</button>
                                </div>
                                <div class="col-xs-6">
                                    <button type="button" class="btn btn-lg btn-block btn-social btn-google-plus btn-color"><i class="mdi mdi-google-plus icon icon-left"></i> Google Plus</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="splash-footer">&copy; {{date("Y")}} Todos los derechos reservados <a style="text-decoration: none; color: #000;" href="http://lunainc.com.mx">Luna inc</a></div>
            </div>
        </div>
    </div>
</div>
<script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
<script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="assets/js/main.js" type="text/javascript"></script>
<script src="assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
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
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
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

