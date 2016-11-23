@extends('layouts.layout')

@section('titulo', ' - Autorización de usuarios')

@section('head')

    @include('layouts.librerias')

@endsection

@section('navbar')

    @include('layouts.app')
    
    @section('content')

        <script type="text/javascript">
            $.notify(" Debe ser un administrador para ingresar al módulo", {
                type:"info", 
                align:"center", 
                verticalAlign:"top", 
                delay:7000, 
                animationType:"scale",
                color: "#fff", 
                background: "#D44950",
            });
        </script>

        <p>Contenido no disponible</p>

    @endsection
@endsection