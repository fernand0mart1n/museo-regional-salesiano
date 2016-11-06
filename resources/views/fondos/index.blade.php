@extends('layouts.layout')

@include('layouts.app')

@section('head')

	@include('layouts.librerias')

@endsection

@section('content')
	<div class="col-md-offset-1 col-md-10">
		<table class="table">
			<thead>
				<tr>
					<th>
						Descripción
					</th>
					<th>
						Cargado por
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
				<tr>
					@foreach($fondos as $fondo)
					<td>
						{{ $fondo->descripcion }}
					</td>
					<td>
						{{ $fondo->user->name }}
					</td>
					<td>
						{{ $fondo->fondo_carga }}
					</td>
					<td>
						<div class="btn-group">
							<a href="{{ route('fondos.show', $fondo->id) }}" class="btn btn-default" title="Ver"><i class="glyphicon glyphicon-eye-open"></i> Ver</a>
	                        <a href="{{ route('fondos.edit', $fondo->id) }}" class="btn btn-default" title="Editar"><i class="glyphicon glyphicon-edit"></i> Editar</a>
	                        <a class="btn btn-danger" title="Eliminar"><i class="glyphicon glyphicon-trash"></i> Eliminar</a>
						</div>
					</td>
					@endforeach
				</tr>
			</tbody>
		</table>
	</div>
@endsection