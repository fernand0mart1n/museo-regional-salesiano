@extends('layouts.layout')

@section('head')

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="{{ asset('css/animate-custom.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />

@endsection

@section('content')

<h2 class="w3ls">Museo Regional Salesiano</h2>          
<div id="container_demo" >
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>
    <div id="wrapper">
        <div id="login" class="animate form">
            <form  action="{{ url('/login') }}" method="post" autocomplete="on"> 
                {{ csrf_field() }}
                <p> 
                    <!--div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}"-->
                    <label for="username" class="uname" data-icon="u" ><span>Nombre de usuario</span></label>
                    <input id="name" name="name" required="required" value="{{ old('username') }}" type="text" placeholder="Usuario"/>

                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </p>
                <p> 
                    <!--div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"-->
                    <label for="password" class="youpasswd" data-icon="p"><span>Contraseña</span></label>
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
                    <a href="#toregister" class="to_register">Registrar</a>
                </p>
            </form>
        </div>
        <div id="register" class="animate form">
            <form  action="{{ url('/register') }}" method="post" autocomplete="on"> 
                {{ csrf_field() }}
                <h2> Registro </h2> 
                <p> 
                    <!--div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"-->
                    <label for="usernamesignup" class="uname" data-icon="u"><span>Tu nombre de usuario</span></label>
                    <input id="usernamesignup" name="name" required="required" value="{{ old('name') }}" type="text" placeholder="Usuario" />
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </p>
                <p> 
                    <!--div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"-->
                    <label for="emailsignup" class="youmail" data-icon="e" ><span>Tu email</span></label>
                    <input id="emailsignup" name="email" required="required" value="{{ old('email') }}" type="email" placeholder="ejemplo@mail.com"/> 
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </p>
                <p> 
                    <!--div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"-->
                    <label for="passwordsignup" class="youpasswd" data-icon="p"><span>Tu contraseña</span></label>
                    <input id="passwordsignup" name="password" required="required" type="password" placeholder="Contraseña"/>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </p>
                <p> 
                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p"><span>Confirma la contraseña</span></label>
                    <input id="passwordsignup_confirm" name="password_confirmation" required="required" type="password" placeholder="Confirma la contraseña"/>
                </p>
                <p class="signin button"> 
                    <input type="submit" value="Registrar"/> 
                </p>
                <p class="change_link">  
                    <span>¿Ya estás dentro?</span>
                    <a href="#tologin" class="to_register">Ingresar</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
