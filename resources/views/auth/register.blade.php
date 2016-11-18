@extends('layouts.layout')

@section('head')

<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" media="all" />

@endsection

@section('content')

<h2 class="w3ls">Museo Regional Salesiano</h2>          
<div id="container_demo" >
    <div id="wrapper">
		<div id="register">
            <form  action="{{ url('/register') }}" method="post" autocomplete="on"> 
                {{ csrf_field() }}
                <h2> Registro </h2> 
                <p> 
                    <!--div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"-->
                    <label for="usernamesignup" class="uname" data-icon=""><span>Tu nombre de usuario</span></label>
                    <input id="usernamesignup" name="name" required="required" value="{{ old('name') }}" type="text" placeholder="Usuario" />
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </p>
                <p> 
                    <!--div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"-->
                    <label for="emailsignup" class="youmail" data-icon="" ><span>Tu email</span></label>
                    <input id="emailsignup" name="email" required="required" value="{{ old('email') }}" type="email" placeholder="ejemplo@mail.com"/> 
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </p>
                <p> 
                    <label for="nombre" class="youpasswd" data-icon=""><span>Confirma la contraseña</span></label>
                    <input id="passwordsignup_confirm" name="password_confirmation" required="required" type="password" placeholder="Confirma la contraseña"/>
                </p>

                <p> 
                    <label for="passwordsignup_confirm" class="youpasswd" data-icon=""><span>Confirma la contraseña</span></label>
                    <input id="passwordsignup_confirm" name="password_confirmation" required="required" type="password" placeholder="Confirma la contraseña"/>
                </p>

                <p> 
                    <!--div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"-->
                    <label for="passwordsignup" data-icon=""><span>Nombre(s)</span></label>
                    <input id="nombre" name="nombre" required="required" type="text" placeholder="Nombre(s)"/>
                    @if ($errors->has('nombre'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                    @endif
                </p>
                <p> 
                    <label for="apellido" data-icon=""><span>Apellido(s)</span></label>
                    <input id="apellido" name="apellido" required="required" type="text" placeholder="Apellido(s)"/>
                </p>

                <label for="sexo">Sexo</label><br>
                <input type="checkbox" name="sexo" value="Masculino">
                <label for="sexo"><span>Masculino <i class="fa fa-male"></i></span></label><br>
                 
                <input type="checkbox" name="sexo" value="Car">
                <label for="sexo"><span>Femenino <i class="fa fa-female"></i></span></label><br><br>

                <p> 
                    <label for="cuil_cuit" data-icon=""><span>CUIL/CUIT</span></label>
                    <input id="cuil_cuit" name="cuil_cuit" required="required" type="text" placeholder="CUIL/CUIT"/>
                </p>

                <p> 
                    <label for="domicilio" data-icon=""><span>Domicilio</span></label>
                    <input id="domicilio" name="domicilio" required="required" type="text" placeholder="Domicilio"/>
                </p>

                <p> 
                    <label for="telefono" data-icon=""><span>Teléfono</span></label>
                    <input id="telefono" name="telefono" required="required" type="text" placeholder="Teléfono"/>
                </p>

                <p> 
                    <label for="fecha_carga" data-icon=""><span>Fecha de carga</span></label>
                    <input id="fecha_carga" name="fecha_carga" required="required" type="text" placeholder="Fecha de carga"/>
                </p>

                <p class="signin button"> 
                    <input type="submit" value="Registrar"/> 
                </p>
                <p class="change_link">  
                    <span>¿Ya estás dentro?</span>
                    <a href="/login" class="to_register">Ingresar</a>
                </p>
            </form>
        </div>
@endsection
