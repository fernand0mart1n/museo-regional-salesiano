 
@extends('layouts.layout')

@section('head')

	@include('layouts.librerias')

@endsection

@section('content')
	<div class="col-md-offset-1 col-md-10">
	    <h1>Cargar fondo</h1>
	    <?= Former::open()
    	->populate( Fondo::find($fondo->id) )
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