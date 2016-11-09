@include('layouts.app')

@extends('layouts.layout')

@section('titulo', ' - Editando' . $fondo->descripcion)

@section('head')

	@include('layouts.librerias')

@endsection

@section('content')
	<div class="col-md-offset-1 col-md-10">
		<ol class="breadcrumb">
	        <li><a href="{{ url('/') }}">Inicio</a></li>
	        <li><a href="{{ route('fondos.index') }}">Fondos</a></li>
	        <li class="active">Fondo {{ $fondo->id }}</li>
	    </ol>
	    <div class="page-header text-center">
	        <h2>
	            Editar fondo {{ $fondo->id }}<small>.</small>
	        </h2>
	    </div>
	    <?= Former::open()
    	->method('patch')
    	->route(['fondos.update', $fondo->id])
    	->action('FondoController@update') ?>

			<!--{!! Form::model($book,['method' => 'PATCH','route'=>['books.update',$book->id]]) !!}-->

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

	        <?= Former::submit('Actualizar') ?>

	    <?= Former::close() ?>
	</div>
@stop