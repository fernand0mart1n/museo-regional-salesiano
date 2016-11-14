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
                <div class="panel-heading">Mensaje de bienvenida</div>

                <div class="panel-body">
                    @if($persona->sexo == 'Masculino')
                        Bienvenido 
                    @else
                        Bienvenida
                    @endif
                    
                    {{ $persona->nombre }}
                    <ul>
                        <li><a href="{{ route('fondos.index') }}">Ir a fondos</a></li>
                        <li><a href="{{ route('clasificaciones.index') }}">Ir a clasificaciones</a></li>
                        <li><a href="{{ route('personas.index') }}">Ir a personas</a></li>
                        <li><a href="{{ route('revisiones.index') }}">Ir a revisiones</a></li>
                        <li><a href="{{ route('piezas.index') }}">Ir a piezas</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
