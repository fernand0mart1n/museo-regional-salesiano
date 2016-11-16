@extends('layouts.layout')

@section('titulo', ' - Nueva revisión')

@section('head')

	@include('layouts.librerias')

@endsection

@section('navbar')

	@include('layouts.app')

	@section('content')
	<ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Inicio</a></li>
        <li><a href="{{ route('revisiones.index') }}">Revisiones</a></li>
        <li class="active">Nueva revisión</li>
    </ol>
    <div class="page-header text-center">
        <h3>
            Nueva revisión<small>.</small>
        </h3>
    </div>

    <?= Former::open()
    ->method('POST')
    ->route('revisiones.store') ?>

    	<?= Former::hidden('usuario_revision')
        ->label('')
        ->value( Auth::user()->id )
        ->readonly() ?>

        <?= Former::text('usuario')
        ->label('Cargado por')
        ->placeholder( Auth::user()->name )
        ->disabled() ?>

        <?= Former::select('pieza')
        ->fromQuery(App\Pieza::all(), 'descripcion', 'id') ?>

        <?= Former::date('fecha_revision')
        ->label('Fecha de carga') ?>

        <?= Former::textarea('estado_conservacion')
        ->label('Estado de conservación')
        ->placeholder('Estado de conservación') ?>

        <?= Former::textarea('ubicacion')
        ->label('Ubicación')
        ->placeholder('Ubicación') ?>

        <div class="form-group">
	        <div class="col-lg-offset-2 col-sm-offset-4 col-lg-10 col-sm-8">
	        	<a href="{{ route('revisiones.index') }}" class="btn btn-default">
	        		<i class="glyphicon glyphicon-chevron-left"></i> Volver
	        	</a>

	        	<?= Former::button()
            	->type('submit')
            	->value('Cargar <i class="glyphicon glyphicon glyphicon-plus"></i>')
            	->class('btn btn-primary pull-right') ?>
            </div>
        </div>

    <?= Former::close() ?>
	@endsection
@endsection