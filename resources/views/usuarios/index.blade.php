@extends('layouts.layout')

@section('titulo', ' - Gestión de usuarios')

@section('head')

	@include('layouts.librerias')

@endsection

@section('navbar')

	@include('layouts.app')
	
	@section('content')
	<ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Inicio</a></li>
        <li class="active">Gestión de usuarios</a></li>
    </ol>
	<h3>Usuarios</h3>
	<hr>
	<table class="table table-condensed table-striped table-hover">
		<thead>
			<tr>
				<th>
					Usuario
				</th>
				<th>
					Apellido(s) y nombre(s)
				</th>
				<th>
					Fecha de carga
				</th>
				<th>
					Acciones
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach($usuarios as $usuario)
			<tr>
				<td>
					{{ $usuario->name }}
				</td>
				<td> 
					{{ $usuario->person->apellido }}, {{ $usuario->person->nombre }}
				</td>
				<td>
					{{ Carbon\Carbon::parse($usuario->person->fecha_carga)->format('d/m/Y') }}
				</td>
				<td>
					<div class="btn-group">
						<a href="{{ url('usuarios', $usuario->id) }}" class="btn btn-inverse" title="Ver"><i class="glyphicon glyphicon-eye-open"></i> Ver datos</a>
                        <a href="{{ url('usuarios/rol', $usuario->id) }}" class="btn btn-inverse" title="Editar"><i class="glyphicon glyphicon-edit"></i> Cambiar rol</a>
                        <?= Former::open()
                        ->class('btn-group')
                        ->method('patch')
                        ->action('usuarios/estado/'. $usuario->id) ?>
                        
                        	{{ csrf_field() }}

	                        @if($usuario->estado)
	                        	<?= Former::hidden('estado')
	                        	->value('0') ?>

		                        <?= Former::button()
		                        ->type('submit')
		                        ->value('<i class="glyphicon glyphicon-remove"></i> Desactivar')
		                        ->class('btn btn-danger') ?>
	                        @else
	                        	<?= Former::hidden('estado')
	                        	->value('1') ?>

		                        <?= Former::button()
		                        ->type('submit')
		                        ->value('<i class="glyphicon glyphicon-check"></i> Activar')
		                        ->class('btn btn-primary') ?>
	                    	@endif
	                    </form>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endsection
@endsection