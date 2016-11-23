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
					Usuario desde
				</th>
				<th>
					Acciones
				</th>
			</tr>
		</thead>
		<tbody>
			{{ Carbon\Carbon::setLocale('es') }}
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
					{{ Carbon\Carbon::parse($usuario->person->fecha_carga)->diffForHumans() }}
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

			@if(Session::has('success'))
				@include('layouts.flash')
			@endif
			
		</tbody>
	</table>

	@extends('layouts.modal')

	@section('modalid', 'myModal')

	@section('modaltitle', 'Cambiar el estado del usuario')

	@section('modalbody', '¿Está seguro que desea cambiar el estado del usuario?')

	@section('modalfooter')
		<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button id="btnDel" type="button" class="btn btn-primary">Cambiar estado</button>
	@endsection

	@endsection
@endsection