@extends('layouts.layout')

@section('titulo', ' - Cargar pieza')

@section('head')

	@include('layouts.librerias')

@endsection

@section('navbar')

	@include('layouts.app')

	@section('content')
	<ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Inicio</a></li>
        <li><a href="{{ route('piezas.index') }}">Piezas</a></li>
        <li class="active">Cargar pieza</li>
    </ol>
    <div class="page-header text-center">
        <h3>
            Cargar pieza<small>.</small>
        </h3>
    </div>

    <?= Former::open()
    ->method('POST')
    ->route('piezas.store') ?>

        <?= Former::textarea('descripcion')
        ->label('Descripción')
        ->placeholder('Descripción')
        ->required() ?>

        <?= Former::select('clasificacion')
        ->label('Clasificación')
        ->required()
        ->fromQuery(App\Clasificacion::all(), 'descripcion', 'id') ?>

        <?= Former::textarea('procedencia')
        ->placeholder('Procedencia') ?>

        <?= Former::text('autor')
        ->placeholder('Autor') ?>

        <?= Former::text('fecha_ejecucion')
        ->label('Fecha de ejecución') ?>

        <?= Former::text('tema')
        ->placeholder('Tema') ?>

        <?= Former::textarea('observacion')
        ->label('Observación')
        ->placeholder('Observación') ?>

        <div class="form-group">
	        <div class="col-lg-offset-2 col-sm-offset-4 col-lg-10 col-sm-8">
	        	<a href="{{ route('piezas.index') }}" class="btn btn-default">
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