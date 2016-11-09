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
	        <h2>
	            Cargar fondo<small>.</small>
	        </h2>
	    </div>
	    <?= Former::open()
        ->method('POST')
        ->action('/fondos'); ?>            

	        <?= Former::textarea('descripcion')
	        ->label('Descripción')
	        ->placeholder('Descripción') ?>

	        <?= Former::hidden('usuario_carga')
	        ->label('')
	        ->value( Auth::user()->id )
	        ->readonly() ?>

	        <?= Former::text('usuario_carga')
	        ->label('Cargado por')
	        ->value( Auth::user()->name )
	        ->disabled() ?>

	        <?= Former::date('fondo_carga')
	        ->label('Fecha de carga') ?>

	        <?= Former::submit('Ingresar') ?>

	    <?= Former::close() ?>
	</div>
@stop