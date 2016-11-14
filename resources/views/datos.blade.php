@extends('layouts.layout')

@include('layouts.app')

@section('head')

    @include('layouts.librerias')

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Mis datos</div>

                <div class="panel-body">
                    Bienvenido/a {{ $persona->nombre }}
                    <h6>Datos de usuario</h6>
                    <ul>
                        <p>Nombre de usuario: {{ $usuario->name }}</p>
                        <p>Email: {{ $usuario->email }}</p>
                    </ul>
                    <h6>Datos personales</h6>
                    <ul>
                        <p>Nombre(s): {{ $persona->nombre }}</p>
                        <p>Apellido(s): {{ $persona->apellido }}</p>
                        <p>CUIL/CUIT: {{ $persona->cuil_cuit }}</p>
                        <p>Domicilio: {{ $persona->domicilio }}</p>
                        <p>Teléfono: {{ $persona->telefono }}</p>
                        <p>Fecha de alta: {{ Carbon\Carbon::parse($persona->fecha_carga)->format('d/m/Y') }}</p>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
