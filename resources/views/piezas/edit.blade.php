@include('layouts.app')

@extends('layouts.layout')

@section('titulo', ' - Editando pieza ' . $pieza->descripcion)

@section('head')

	@include('layouts.librerias')

@endsection

@section('content')
	<div class="col-md-offset-1 col-md-10">
		<ol class="breadcrumb">
	        <li><a href="{{ url('/') }}">Inicio</a></li>
	        <li><a href="{{ route('piezas.index') }}">Piezas</a></li>
	        <li class="active">{{ $pieza->descripcion }}</li>
	    </ol>
	    <div class="page-header text-center">
	        <h3>
	            Editando pieza {{ $pieza->descripcion }}<small>.</small>
	        </h3>
	    </div>

	    <?= Former::open()
    	->method('patch')
    	->route('piezas.update', $pieza->id) ?>

	        <?= Former::textarea('descripcion')
	        ->label('Descripción')
	        ->placeholder('Descripción')
	        ->value($pieza->descripcion)
	        ->required() ?>

	        <?= Former::select('clasif')
	        ->label('Clasificación')
	        ->required()
	        ->fromQuery(App\Clasificacion::all(), 'descripcion', 'id') ?>

	        <?= Former::textarea('procedencia')
	        ->value($pieza->procedencia)
	        ->placeholder('Procedencia') ?>

	        <?= Former::text('autor')
	        ->value($pieza->autor)
	        ->placeholder('Autor') ?>

	        <?= Former::date('fecha_ejecucion')
	        ->value($pieza->fecha_ejecucion)
	        ->label('Fecha de ejecución') ?>

	        <?= Former::text('tema')
	        ->value($pieza->tema)
	        ->placeholder('Tema') ?>

	        <?= Former::textarea('observacion')
	        ->value($pieza->observacion)
	        ->label('Observación')
	        ->placeholder('Observación') ?>

	        <div class="form-group">
		        <div class="col-lg-offset-2 col-sm-offset-4 col-lg-10 col-sm-8">
		        	<a href="{{ route('piezas.index') }}" class="btn btn-default">
		        		<i class="glyphicon glyphicon-chevron-left"></i> Volver
		        	</a>

		        	<?= Former::button()
	            	->type('submit')
	            	->value('Actualizar <i class="glyphicon glyphicon-floppy-save"></i>')
	            	->class('btn btn-primary pull-right') ?>
	            </div>
	        </div>

	    <?= Former::close() ?>
	</div>
@stop