@extends('layouts.layout')

@section('titulo', ' - Editando fondo ' . $fondo->descripcion)

@section('head')

	@include('layouts.librerias')

@endsection

@section('navbar')

	@include('layouts.app')

	@section('content')
	<ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Inicio</a></li>
        <li><a href="{{ route('fondos.index') }}">Fondos</a></li>
        <li class="active">Fondo {{ $fondo->id }}</li>
    </ol>
    <div class="page-header text-center">
        <h3>
            Editar fondo {{ $fondo->id }}<small>.</small>
        </h3>
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
        ->placeholder( $fondo->user->name )
        ->readonly() ?>

        <?= Former::date('fecha_carga')
        ->label('Fecha de carga')
        ->value( Carbon\Carbon::parse($fondo->fecha_carga)->format('d/m/Y') ) ?>

        <div class="form-group">
	        <div class="col-lg-offset-2 col-sm-offset-4 col-lg-10 col-sm-8">
	        	<a href="{{ route('fondos.index') }}" class="btn btn-default">
	        		<i class="glyphicon glyphicon-chevron-left"></i> Volver
	        	</a>

	        	<?= Former::button()
            	->type('submit')
            	->value('Actualizar <i class="glyphicon glyphicon-floppy-save"></i>')
            	->class('btn btn-primary pull-right') ?>
            </div>
        </div>

    <?= Former::close() ?>
    @endsection
@endsection