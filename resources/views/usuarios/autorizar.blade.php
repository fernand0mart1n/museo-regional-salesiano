@extends('layouts.layout')

@section('titulo', ' - Autorización de usuarios')

@section('head')

    @include('layouts.librerias')

@endsection

@section('navbar')

    @include('layouts.app')
    
    @section('content')
    <ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Inicio</a></li>
        <li><a href="{{ url('usuarios') }}">Gestión de usuarios</a></li>
        <li class="active">Autorizar usuarios</a></li>
    </ol>
    <h3>Usuarios sin autorización</h3>
    <hr>
    <table class="table table-condensed table-striped table-hover">
        <thead>
            <tr>
                <th>
                    Usuario
                </th>
                <th>
                    Apellido(s) y nombre(s)
                </th>
                <th>
                    Solicitó unirse
                </th>
                <th>
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            {{ Carbon\Carbon::setLocale('es') }}
            @foreach($sinAutorizar as $usuario)
            <tr>
                <td>
                    {{ $usuario->name }}
                </td>
                <td> 
                    {{ $usuario->person->apellido }}, {{ $usuario->person->nombre }}
                </td>
                <td>
                    {{ Carbon\Carbon::parse($usuario->person->fecha_carga)->diffForHumans() }}
                </td>
                <td>
                    <?= Former::button()
                    ->onclick("autorizar($usuario->id)")
                    ->value('<i class="glyphicon glyphicon-check"></i> Agregar rol y autorizar')
                    ->class('btn btn-primary') ?>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @extends('layouts.modal')

    @section('modalid', 'myModal')

    @section('modaltitle', 'Autorizar al usuario ' . $usuario->name)

    @section('modalbody')

        <p>¿Está seguro que desea autorizar al usuario {{ $usuario->name }}? <br>
        Se activará al usuario con el rol seleccionado.</p><br>

        <?= Former::select('rol')
        ->fromQuery(App\Role::all(), 'display_name', 'id')
        ->required() ?>
    @endsection

    @section('modalfooter')
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button id="btnDel" type="button" class="btn btn-primary">Autorizar usuario</button>
    @endsection

    @endsection
@endsection