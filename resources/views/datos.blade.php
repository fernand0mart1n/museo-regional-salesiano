@extends('layouts.layout')

@section('head')

    @include('layouts.librerias')

@endsection

@section('navbar')

    @include('layouts.app')

    @section('content')
    <div class="panel panel-success">
        <div class="panel-heading">Mis datos</div>
            <div class="panel-body">            
                <div class="panel panel-success">
                    <div class="panel-heading">Datos de usuario</div>
                    <div class="panel-body">
                        <ul>
                            <li>Nombre de usuario: <b>{{ $usuario->name }}</b></li>
                            <li>Email: <b>{{ $usuario->email }}</b></li>
                            <li>Rol: <b>@foreach($usuario->roles as $role)
                                            {{ $role->display_name }}. Un {{ strtolower($role->display_name) }} {{ strtolower($role->description) }} 
                                        @endforeach</b></li>
                            </ul>
                    </div>
                </div>
                <div class="panel panel-success">
                    <div class="panel-heading">Datos personales</div>
                    <div class="panel-body">
                        <ul>
                            <li>Nombre completo: <b>{{ $persona->nombre }} {{ $persona->apellido }}</b></li>
                            <li>Sexo: <b>{{ $persona->sexo }}</b></li>
                            <li>CUIL/CUIT: <b>{{ $persona->cuil_cuit }}</b></li>
                            <li>Domicilio: <b>{{ $persona->domicilio }}</b></li>
                            <li>Teléfono: <b>{{ $persona->telefono }}</b></li>
                            {{ Carbon\Carbon::setLocale('es') }}
                            <li>Usuario desde <b>{{ Carbon\Carbon::parse($persona->fecha_carga)->diffForHumans() }}</b></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endsection
