@extends('layouts.layout')

@section('titulo', ' - Editando revisión a ' . $revision->piez->descripcion)

@section('head')

	@include('layouts.librerias')

@endsection

@section('navbar')

	@include('layouts.app')

	@section('content')
	<ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Inicio</a></li>
        <li><a href="{{ route('revisiones.index') }}">Revisiones</a></li>
        <li class="active">Revisión {{ $revision->id }}</li>
    </ol>
    <div class="page-header text-center">
        <h3>
            Editar revisión {{ $revision->id }}<small>.</small>
        </h3>
    </div>

    <?= Former::open()
	->method('patch')
	->route('revisiones.update', $revision->id) ?>

        <?= Former::text('usuario')
        ->label('Cargado por')
        ->placeholder( Auth::user()->name )
        ->readonly() ?>

        <?= Former::select('pieza')
        ->fromQuery(App\Pieza::all(), 'descripcion', 'id')
        ->value($revision->piez->descripcion) ?>

        <?= Former::date('fecha_revision')
        ->value($revision->fecha_revision)
        ->label('Fecha de carga') ?>

        <?= Former::textarea('estado_conservacion')
        ->label('Estado de conservación')
        ->value($revision->estado_conservacion)
        ->placeholder('Estado de conservación') ?>

        <?= Former::textarea('ubicacion')
        ->label('Ubicación')
        ->value($revision->ubicacion)
        ->placeholder('Ubicación') ?>

        <div class="form-group">
	        <div class="col-lg-offset-2 col-sm-offset-4 col-lg-10 col-sm-8">
	        	<a href="{{ route('revisiones.index') }}" class="btn btn-default">
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