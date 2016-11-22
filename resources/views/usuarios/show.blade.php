@extends('layouts.layout')

@section('titulo', ' - ' . $usuario->name)

@section('head')

	@include('layouts.librerias')

@endsection

@section('navbar')

	@include('layouts.app')

	@section('content')
	<ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Inicio</a></li>
        <li><a href="{{ route('personas.index') }}">Gestión de usuarios</a></li>
        <li class="active">{{ $usuario->name }}</li>
    </ol>
    <div class="page-header text-center">
        <h4>
            Usuario: {{ $usuario->name }} ({{ $usuario->person->nombre }} {{ $usuario->person->apellido }})<small>.</small>
        </h4>
    </div>
    <?= Former::open() ?>

        <?= Former::text('usuario')
        ->placeholder('Usuario')
        ->placeholder($usuario->name)
        ->readonly() ?>

        <?= Former::email('email')
        ->placeholder('Email')
        ->placeholder($usuario->email)
        ->readonly() ?>

        <?= Former::text('nombre')
        ->placeholder('Nombre')
        ->placeholder($usuario->person->nombre)
        ->readonly() ?>

        <?= Former::text('apellido')
        ->placeholder($usuario->person->apellido)
        ->readonly() ?>

        <?= Former::text('cuil_cuit')
        ->label('CUIL/CUIT')
        ->placeholder($usuario->person->cuil_cuit)
        ->readonly() ?>

        <?= Former::text('domicilio')
        ->placeholder($usuario->person->domicilio)
        ->readonly() ?>

        <?= Former::text('telefono')
        ->label('Teléfono')
        ->placeholder($usuario->person->telefono)
        ->readonly() ?>

        <?= Former::text('fecha_carga')
        ->label('Fecha de carga') 
        ->placeholder(Carbon\Carbon::parse($usuario->person->fecha_carga)->format('d/m/Y'))
        ->readonly() ?>

        <div class="form-group">
            <div class="col-lg-offset-2 col-sm-offset-4 col-lg-10 col-sm-8">
                <a href="{{ url('usuarios') }}" class="btn btn-default">
                    <i class="glyphicon glyphicon-chevron-left"></i> Volver
                </a>
                </a>
                <div class="btn-group pull-right">
                    <a href="{{ url('usuarios/rol', $usuario->id) }}" class="btn btn-inverse"> 
                        <i class="glyphicon glyphicon-edit"></i> Cambiar rol
                    </a>
                    @if(false)
                        <a href="{{ url('usuarios/rol', $usuario->id) }}" class="btn btn-primary"> 
                            Activar <i class="glyphicon glyphicon-check"></i>
                        </a>
                    @else
                        <a href="{{ url('usuarios/rol', $usuario->id) }}" class="btn btn-danger"> 
                            Desactivar <i class="glyphicon glyphicon-remove"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>

    <?= Former::close() ?>
	@endsection
@endsection