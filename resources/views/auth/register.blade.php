@extends('layouts.layout')

@section('head')

<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />

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

                <?= Former::text('nombre')
                ->placeholder('Nombre') ?>

                <?= Former::text('apellido')
                ->placeholder('Apellido') ?>

                <label for="sexo">Sexo</label><br>
                <input type="checkbox" name="sexo" value="Masculino">
                <label for="sexo"><span></span> Masculino</label><br>
                 
                <input type="checkbox" name="sexo" value="Car">
                <label for="sexo"><span></span> Femenino</label><br><br>

                <?= Former::text('cuil_cuit')
                ->label('CUIL/CUIT')
                ->placeholder('CUIL/CUIT') ?>

                <?= Former::text('domicilio')
                ->placeholder('Domicilio') ?>

                <?= Former::text('telefono')
                ->label('Teléfono')
                ->placeholder('Teléfono') ?>

                <?= Former::date('fecha_carga')
                ->label('Fecha de carga') ?>

                <p class="signin button"> 
                    <input type="submit" value="Registrar"/> 
                </p>
                <p class="change_link">  
                    <span>¿Ya estás dentro?</span>
                    <a href="/login" class="to_register">Ingresar</a>
                </p>
            </form>
        </div>