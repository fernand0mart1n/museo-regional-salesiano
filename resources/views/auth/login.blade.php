@extends('layouts.layout')

@section('head')

<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/notify.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/prettify.css') }}">
<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('js/notify.js') }}"></script>
<script src="{{ asset('js/prettify.js') }}"></script>

@if(count('errors'))
    @foreach($errors->all() as $error)
    <script type="text/javascript">
    $(document).ready( function(){
        $.notify("{{ $error }}", {
            type:"danger", 
            align:"left", 
            verticalAlign:"bottom", 
            animationType:"scale",
            color: "#fff", 
            delay:0,
            background: "#D44950",
            icon:"bell",
            close: true
        });
    });
    </script>
    @endforeach
@endif

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
