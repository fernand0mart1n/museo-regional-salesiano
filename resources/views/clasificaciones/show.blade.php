@include('layouts.app')

@extends('layouts.layout')

@section('titulo', ' - ' . $clasificacion->descripcion)

@section('head')

	@include('layouts.librerias')

@endsection

@section('content')
	<div class="col-md-offset-1 col-md-10">
		<ol class="breadcrumb">
	        <li><a href="{{ url('/') }}">Inicio</a></li>
	        <li><a href="{{ route('clasificaciones.index') }}">Clasificaciones</a></li>
	        <li class="active">Clasificación {{ $clasificacion->id }}</li>
	    </ol>
	    <div class="page-header text-center">
	        <h3>
	            Ver clasificación {{ $clasificacion->id }}<small>.</small>
	        </h3>
	    </div>
	    <?= Former::open()
    	->method('patch')
    	->route('clasificaciones.update', $clasificacion->id) ?>

	        <?= Former::textarea('descripcion')
	        ->label('Descripción')
	        ->placeholder($clasificacion->descripcion)
	        ->readonly() ?>

	        <?= Former::textarea('fondo_id')
	        ->label('Pertenece al fondo')
	        ->placeholder($clasificacion->fondo->descripcion)
	        ->readonly() ?>

	        <?= Former::text('usuario')
	        ->label('Cargado por')
	        ->placeholder( $clasificacion->user->name )
	        ->readonly() ?>

	        <?= Former::date('fecha_carga')
	        ->label('Fecha de carga')
	        ->placeholder($clasificacion->fecha_carga)
	        ->readonly() ?>

	        <div class="form-group">
	            <div class="col-lg-offset-2 col-sm-offset-4 col-lg-10 col-sm-8">
	                <a href="{{ route('clasificaciones.index') }}" class="btn btn-default">
	                	<i class="glyphicon glyphicon-chevron-left"></i> Volver
	                </a>
	                <a href="{{ route('clasificaciones.edit', $clasificacion->id) }}" class="btn btn-primary pull-right"> 
	                	Editar <i class="glyphicon glyphicon-edit"></i>
	                </a>
	            </div>
	        </div>

	    <?= Former::close() ?>
	</div>
@stop