@include('layouts.app')

@extends('layouts.layout')

@section('titulo', ' - ' . $persona->nombre . ' ' . $persona->apellido)

@section('head')

	@include('layouts.librerias')

@endsection

@section('content')
	<div class="col-md-offset-1 col-md-10">
		<ol class="breadcrumb">
	        <li><a href="{{ url('/') }}">Inicio</a></li>
	        <li><a href="{{ route('personas.index') }}">Personas</a></li>
	        <li class="active">Persona {{ $persona->id }}</li>
	    </ol>
	    <div class="page-header text-center">
	        <h3>
	            Ver persona {{ $persona->id }}<small>.</small>
	        </h3>
	    </div>
	    <?= Former::open()
    	->method('patch')
    	->route('personas.update', $persona->id) ?>

	        <?= Former::text('nombre')
	        ->placeholder('Nombre')
	        ->placeholder($persona->nombre)
	        ->readonly() ?>

	        <?= Former::text('apellido')
	        ->placeholder($persona->apellido)
	        ->readonly() ?>

	        <?= Former::text('cuil_cuit')
	        ->label('CUIL/CUIT')
	        ->placeholder($persona->cuil_cuit)
	        ->readonly() ?>

	        <?= Former::text('domicilio')
	        ->placeholder($persona->domicilio)
	        ->readonly() ?>

	        <?= Former::text('telefono')
	        ->label('Teléfono')
	        ->placeholder($persona->telefono)
	        ->readonly() ?>

	        <?= Former::date('fecha_carga')
	        ->label('Fecha de carga') 
	        ->placeholder(Carbon\Carbon::parse($persona->fecha_carga)->format('d/m/Y'))
	        ->readonly() ?>

	        <div class="form-group">
		        <div class="col-lg-offset-2 col-sm-offset-4 col-lg-10 col-sm-8">
		        	<a href="{{ route('personas.index') }}" class="btn btn-default">
		        		<i class="glyphicon glyphicon-chevron-left"></i> Volver
		        	</a>
	                </a>
	                <a href="{{ route('personas.edit', $persona->id) }}" class="btn btn-primary pull-right"> 
	                	Editar <i class="glyphicon glyphicon-edit"></i>
	                </a>
	            </div>
	        </div>

	    <?= Former::close() ?>
	</div>
@stop