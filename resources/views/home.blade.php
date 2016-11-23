@extends('layouts.layout')

@section('head')

    @include('layouts.librerias')

@endsection

@section('navbar')

    @include('layouts.app')

    @section('content')

        <div class="panel panel-default">
            <div class="panel-heading">Mensaje de bienvenida</div>

            <div class="panel-body">
                @if(Auth::user()->person->sexo == 'Masculino')
                    Bienvenido 
                @else
                    Bienvenida
                @endif
                
                {{ Auth::user()->person->nombre }}
            </div>
        </div>
    @endsection

@endsection