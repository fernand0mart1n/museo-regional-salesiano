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
					Estado
				</th>
				<th>
					Rol
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
				<td class="td-icon">
					@if($usuario->estado)
						<i class="fa fa-check"></i>
					@else
						<i class="fa fa-remove"></i>
					@endif
				</td>
				<td>
					@foreach($usuario->roles as $role)
        				{{ $role->display_name }}
    				@endforeach
				</td>
				<td>
					{{ Carbon\Carbon::parse($usuario->person->fecha_carga)->format('d/m/Y') }}
				</td>
				<td>
					<div class="btn-group">
						<a href="{{ url('usuarios', $usuario->id) }}" class="btn btn-inverse" title="Ver"><i class="glyphicon glyphicon-eye-open"></i> Ver datos</a>
                        <a href="{{ url('usuarios/rol', $usuario->id) }}" class="btn btn-inverse" title="Editar"><i class="glyphicon glyphicon-edit"></i> Cambiar rol</a>
                        <?= Former::open() 
                        ->class('btn-group') ?>
                        
                        	{{ csrf_field() }}

	                        @if($usuario->estado)
		                        <?= Former::button()
		                        ->onclick("activar($usuario->id, 0)")
		                        ->value('<i class="glyphicon glyphicon-remove"></i> Desactivar')
		                        ->class('btn btn-danger') ?>
	                        @else
		                        <?= Former::button()
		                        ->onclick("activar($usuario->id, 1)")
		                        ->value('<i class="glyphicon glyphicon-check"></i> Activar')
		                        ->class('btn btn-primary') ?>
	                    	@endif
	                    </form>
					</div>
				</td>
			</tr>
			@endforeach

			@include('layouts.flash')
			
		</tbody>
	</table>

	@include('layouts.activar')

	@endsection
@endsection