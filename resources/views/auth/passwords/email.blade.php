@extends('layouts.layout')

@section('head')

<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />

@endsection

@section('content')

<h2 class="w3ls">Museo Regional Salesiano</h2>          
<div id="container_demo" >
    <div id="wrapper">
        <div id="email">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form  action="{{ url('/password/email') }}" method="post" autocomplete="on"> 
                {{ csrf_field() }}
                <h2> Recuperar contraseña </h2> 
                <p> 
                    <!--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">-->
                    <label for="email" class="uname" data-icon=""><span>E-Mail</span></label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Email">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </p>
                <p class="login button"> 
                    <input type="submit" value="Enviar enlace para reestablecer" /> 
                </p>
                <p class="change_link">
                    <span>¿Deseas ingresar?</span>
                    <a href="/login" class="to_register">Ir a ingreso</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
