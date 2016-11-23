@extends('layouts.layout')

@section('titulo', ' - ' . $usuario->name)

@section('head')

	@include('layouts.librerias')

@endsection

@section('navbar')

	@include('layouts.app')

	@section('content')
	<ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Inicio</a></li>
        <li><a href="{{ route('personas.index') }}">Gestión de usuarios</a></li>
        <li class="active">{{ $usuario->name }}</li>
    </ol>
    <div class="page-header text-center">
        <h4>
            Usuario: {{ $usuario->name }} ({{ $usuario->person->nombre }} {{ $usuario->person->apellido }})<small>.</small>
        </h4>
    </div>
    <?= Former::open() ?>

    	<?= Former::select('rol')
	    ->fromQuery(App\Role::all(), 'display_name', 'id')
	    ->required() ?>

        <div class="form-group">
            <div class="col-lg-offset-2 col-sm-offset-4 col-lg-10 col-sm-8">
                <a href="{{ url('usuarios') }}" class="btn btn-default">
                    <i class="glyphicon glyphicon-chevron-left"></i> Volver
                </a>
                <?= Former::button()
	            ->onclick("autorizar($usuario->id)")
	            ->value('<i class="glyphicon glyphicon-check"></i> Agregar rol y autorizar')
	            ->class('btn btn-primary pull-right') ?>
            </div>
        </div>

    <?= Former::close() ?>

    @extends('layouts.modal')

	@section('modalid', 'myModal')

	@section('modaltitle', 'Cambiar el rol del usuario ' . $usuario->name)

	@section('modalbody')
		<p>¿Está seguro que desea cambiar el rol del usuario {{ $usuario->name }}?</p>
	    <br>
	@endsection

	@section('modalfooter')
		<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	    <button id="btnDel" type="button" class="btn btn-primary">Cambiar rol</button>
	@endsection

	@endsection
@endsection