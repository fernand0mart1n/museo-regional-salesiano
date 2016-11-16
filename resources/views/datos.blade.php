@extends('layouts.layout')

@section('head')

    @include('layouts.librerias')

@endsection

@section('navbar')

    @include('layouts.app')

    @section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Mis datos</div>

        <div class="panel-body">
            @if($persona->sexo == 'Masculino')
                Bienvenido 
            @else
                Bienvenida
            @endif
            
            {{ $persona->nombre }}
            <h6>Datos de usuario</h6>
            <ul>
                <p>Nombre de usuario: {{ $usuario->name }}</p>
                <p>Email: {{ $usuario->email }}</p>
            </ul>
            <h6>Datos personales</h6>
            <ul>
                <p>Apellido(s) y nombre(s): {{ $persona->apellido }}, {{ $persona->nombre }}</p>
                <p>CUIL/CUIT: {{ $persona->cuil_cuit }}</p>
                <p>Domicilio: {{ $persona->domicilio }}</p>
                <p>Teléfono: {{ $persona->telefono }}</p>
                <p>Fecha de alta: {{ Carbon\Carbon::parse($persona->fecha_carga)->format('d/m/Y') }}</p>
            </ul>
        </div>
    </div>
    @endsection
@endsection
