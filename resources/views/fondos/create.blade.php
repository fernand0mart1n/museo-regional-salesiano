@include('layouts.app')

@extends('layouts.layout')

@section('titulo', ' - Cargar fondo')

@section('head')

	@include('layouts.librerias')

@endsection

@section('content')
	<div class="col-md-offset-1 col-md-10">
		<ol class="breadcrumb">
	        <li><a href="{{ url('/') }}">Inicio</a></li>
	        <li><a href="{{ route('fondos.index') }}">Fondos</a></li>
	        <li class="active">Cargar fondo</li>
	    </ol>
	    <div class="page-header text-center">
	        <h3>
	            Cargar fondo<small>.</small>
	        </h3>
	    </div>

	    <?= Former::open()
        ->method('POST')
        ->route('fondos.store') ?>

	        <?= Former::textarea('descripcion')
	        ->label('Descripción')
	        ->placeholder('Descripción') ?>

	        <?= Former::hidden('usuario_carga')
	        ->label('')
	        ->value( Auth::user()->id )
	        ->readonly() ?>

	        <?= Former::text('usuario')
	        ->label('Cargado por')
	        ->value( Auth::user()->name )
	        ->disabled() ?>

	        <?= Former::date('fecha_carga')
	        ->label('Fecha de carga') ?>

	        <div class="form-group">
		        <div class="col-lg-offset-2 col-sm-offset-4 col-lg-10 col-sm-8">
		        	<a href="{{ route('fondos.index') }}" class="btn btn-default">
		        		<i class="glyphicon glyphicon-chevron-left"></i> Volver
		        	</a>

		        	<?= Former::button()
	            	->type('submit')
	            	->value('Cargar <i class="glyphicon glyphicon glyphicon-plus"></i>')
	            	->class('btn btn-primary pull-right') ?>
	            </div>
	        </div>

	    <?= Former::close() ?>
	</div>
@stop