@extends('layouts.layout')

@section('titulo', ' - Cargar clasificación')

@section('head')

	@include('layouts.librerias')

@endsection

@section('navbar')

	@include('layouts.app')
	
	@section('content')
	<ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Inicio</a></li>
        <li><a href="{{ route('clasificaciones.index') }}">Clasificaciones</a></li>
        <li class="active">Cargar clasificación</li>
    </ol>
    <div class="page-header text-center">
        <h3>
            Cargar clasificación<small>.</small>
        </h3>
    </div>

    <?= Former::open()
    ->method('POST')
    ->route('clasificaciones.store') ?>

        <?= Former::textarea('descripcion')
        ->label('Descripción')
        ->placeholder('Descripción')
        ->required() ?>

        <?= Former::select('fondo_id')
        ->label('Pertenece al fondo')
        ->fromQuery(App\Fondo::all(), 'descripcion', 'id') 
        ->required() ?>

        <?= Former::hidden('usuario_carga')
        ->label('')
        ->value( Auth::user()->id )
        ->readonly() ?>

        <div class="form-group">
	        <div class="col-lg-offset-2 col-sm-offset-4 col-lg-10 col-sm-8">
	        	<a href="{{ route('clasificaciones.index') }}" class="btn btn-default">
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