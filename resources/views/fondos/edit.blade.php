@include('layouts.app')

@extends('layouts.layout')

@section('head')

	@include('layouts.librerias')

@endsection

@section('content')
	<div class="col-md-offset-1 col-md-10">
		<ol class="breadcrumb">
	        <li><a href="{{ url('home') }}">Inicio</a></li>
	        <li><a href="{{ route('fondos.index') }}">Fondos</a></li>
	        <li class="active">Editar fondo {{ $fondo->id }}</li>
	    </ol>
	    <div class="page-header text-center">
	        <h2>
	            Editar fondo {{ $fondo->id }}<small>.</small>
	        </h2>
	    </div>

	    <?= Former::open()
    	->method('patch')
    	->route('fondos.update', $fondo->id) ?>

	        <?= Former::textarea('descripcion')
	        ->label('Descripción')
	        ->value($fondo->descripcion)
	        ->placeholder('Descripción') ?>

	        <?= Former::text('usuario')
	        ->label('Cargado por')
	        ->value( $fondo->user->name )
	        ->readonly() ?>

	        <?= Former::date('fondo_carga')
	        ->label('Fecha de carga')
	        ->value($fondo->fondo_carga) ?>

	        <div class="form-group">
		        <div class="col-lg-offset-2 col-sm-offset-4 col-lg-10 col-sm-8">
		        	<a href="{{ route('fondos.index') }}" class="btn btn-default">
		        		<i class="glyphicon glyphicon-chevron-left"></i> Volver
		        	</a>

		        	<?= Former::button()
	            	->type('submit')
	            	->value('Actualizar <i class="glyphicon glyphicon-floppy-save"></i>')
	            	->class('btn btn-success pull-right') ?>
	            </div>
	        </div>

	    <?= Former::close() ?>
	</div>
@stop