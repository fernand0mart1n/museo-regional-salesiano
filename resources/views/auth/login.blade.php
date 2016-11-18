@extends('layouts.layout')

@section('head')

<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />

@endsection

@section('content')

<h2 class="w3ls">Museo Regional Salesiano</h2>          
<div id="container_demo" >
    <div id="wrapper">
        <div id="login">
            <form  action="{{ url('/login') }}" method="post" autocomplete="on"> 
                {{ csrf_field() }}
                <h2> Ingresar </h2> 
                <p> 
                    <!--div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}"-->
                    <label for="username" class="uname" data-icon="" ><span>Nombre de usuario</span></label>
                    <input id="name" name="name" required="required" value="{{ old('username') }}" type="text" placeholder="Usuario"/>

                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </p>
                <p> 
                    <!--div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"-->
                    <label for="password" class="youpasswd" data-icon=""><span>Contraseña</span></label>
                    <input id="password" name="password" required="required" type="password" placeholder="Contraseña" /> 
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </p>
                <p class="keeplogin"> 
                    <input type="checkbox" name="remember" id="brand" value="">
                    <label for="brand"><span></span> Recuérdame</label>
                    <label for="forgot" class="a-la-derecha"> ¿Olvidaste tu contraseña? <a href="{{ url('/password/reset') }}">Clic aquí</a></label>
                </p>
                <p class="login button"> 
                    <input type="submit" value="Ingresar" /> 
                </p>
                <p class="change_link">
                    <span>¿No estás registrado?</span>
                    <a href="/register" class="to_register">Registrar</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
