@include('layouts.app')

@extends('layouts.layout')

@section('titulo', ' - ' . $pieza->descripcion)

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
	            {{ $pieza->descripcion }}<small>.</small>
	        </h3>
	    </div>
	    <?= Former::open()
    	->method('patch')
    	->route('piezas.update', $pieza->id) ?>

	        <?= Former::textarea('descripcion')
	        ->label('Descripción')
	        ->placeholder($pieza->descripcion)
	        ->required() 
	        ->readonly() ?>

	        <?= Former::select('clasificacion')
	        ->label('Clasificación')
	        ->required()
	        ->placeholder($pieza->clasif->descripcion)
	        ->readonly() ?>

	        <?= Former::textarea('procedencia')
	        ->placeholder($pieza->procedencia)
	        ->readonly() ?>

	        <?= Former::text('autor')
	        ->placeholder($pieza->autor)
	        ->readonly() ?>

	        <?= Former::date('fecha_ejecucion')
	        ->placeholder($pieza->fecha_ejecucion)
	        ->label('Fecha de ejecución')
	        ->readonly() ?>

	        <?= Former::text('tema')
	        ->placeholder($pieza->tema)
	        ->placeholder('Tema')
	        ->readonly() ?>

	        <?= Former::textarea('observacion')
	        ->placeholder($pieza->observacion)
	        ->label('Observación')
	        ->readonly() ?>

	        <div class="form-group">
		        <div class="col-lg-offset-2 col-sm-offset-4 col-lg-10 col-sm-8">
		        	<a href="{{ route('piezas.index') }}" class="btn btn-default">
		        		<i class="glyphicon glyphicon-chevron-left"></i> Volver
		        	</a>
	                </a>
	                <a href="{{ route('piezas.edit', $pieza->id) }}" class="btn btn-primary pull-right"> 
	                	Editar <i class="glyphicon glyphicon-edit"></i>
	                </a>
	            </div>
	        </div>

	    <?= Former::close() ?>
	</div>
@stop