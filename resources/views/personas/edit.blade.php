@extends('layouts.layout')

@section('titulo', ' - Editando a ' . $persona->nombre . ' ' . $persona->apellido)

@section('head')

	@include('layouts.librerias')

@endsection

@section('navbar')

	@include('layouts.app')

	@section('content')
	<ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Inicio</a></li>
        <li><a href="{{ route('personas.index') }}">Personas</a></li>
        <li class="active">{{ $persona->nombre }} {{ $persona->apellido }}</li>
    </ol>
    <div class="page-header text-center">
        <h3>
            Editando a {{ $persona->nombre }} {{ $persona->apellido }}<small>.</small>
        </h3>
    </div>

    <?= Former::open()
	->method('patch')
	->route('personas.update', $persona->id) ?>

        <?= Former::text('nombre')
        ->value($persona->nombre)
        ->placeholder('Nombre') ?>

        <?= Former::text('apellido')
        ->value($persona->apellido)
        ->placeholder('Apellido') ?>

        <?= Former::text('cuil_cuit')
        ->label('CUIL/CUIT')
        ->value($persona->cuil_cuit)
        ->placeholder('CUIL/CUIT') ?>

        <?= Former::text('domicilio')
        ->value($persona->domicilio)
        ->placeholder('Domicilio') ?>

        <?= Former::text('telefono')
        ->value($persona->telefono)
        ->label('Teléfono')
        ->placeholder('Teléfono') ?>

        <?= Former::date('fecha_carga')
        ->value(Carbon\Carbon::parse($persona->fecha_carga)->format('d/m/Y'))
        ->label('Fecha de carga') ?>

        <div class="form-group">
	        <div class="col-lg-offset-2 col-sm-offset-4 col-lg-10 col-sm-8">
	        	<a href="{{ route('personas.index') }}" class="btn btn-default">
	        		<i class="glyphicon glyphicon-chevron-left"></i> Volver
	        	</a>

	        	<?= Former::button()
            	->type('submit')
            	->value('Actualizar <i class="glyphicon glyphicon-floppy-save"></i>')
            	->class('btn btn-primary pull-right') ?>
            </div>
        </div>

    <?= Former::close() ?>
	@endsection
@endsection