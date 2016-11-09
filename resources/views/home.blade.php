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
                    Bienvenido/a {{ Auth::user()->name . " - " . Auth::user()->email }}
                    <li><a href="{{ route('fondos.index') }}">Ir a fondos</a></li>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
