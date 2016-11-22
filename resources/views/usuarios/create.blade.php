@extends('layouts.layout')

@section('titulo', ' - Cargar persona')

@section('head')

	@include('layouts.librerias')

@endsection

@section('navbar')

	@include('layouts.app')

	@section('content')
	<ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Inicio</a></li>
        <li><a href="{{ route('personas.index') }}">Personas</a></li>
        <li class="active">Cargar persona</li>
    </ol>
    <div class="page-header text-center">
        <h3>
            Cargar persona<small>.</small>
        </h3>
    </div>

    <?= Former::open()
    ->method('POST')
    ->route('personas.store') ?>

        <?= Former::text('nombre')
        ->placeholder('Nombre') ?>

        <?= Former::text('apellido')
        ->placeholder('Apellido') ?>

        <?= Former::text('cuil_cuit')
        ->label('CUIL/CUIT')
        ->placeholder('CUIL/CUIT') ?>

        <?= Former::text('domicilio')
        ->placeholder('Domicilio') ?>

        <?= Former::text('telefono')
        ->label('Teléfono')
        ->placeholder('Teléfono') ?>

        <?= Former::date('fecha_carga')
        ->label('Fecha de carga') ?>

        <div class="form-group">
	        <div class="col-lg-offset-2 col-sm-offset-4 col-lg-10 col-sm-8">
	        	<a href="{{ route('personas.index') }}" class="btn btn-default">
	        		<i class="glyphicon glyphicon-chevron-left"></i> Volver
	        	</a>

	        	<?= Former::button()
            	->type('submit')
            	->value('Guardar <i class="glyphicon glyphicon glyphicon-plus"></i>')
            	->class('btn btn-primary pull-right') ?>
            </div>
        </div>

    <?= Former::close() ?>
	@endsection
@endsection