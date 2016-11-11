@extends('layouts.layout')

@include('layouts.app')

@section('titulo', ' - Listado de personas')

@section('head')

	@include('layouts.librerias')

@endsection

@section('content')
	<div class="col-md-offset-1 col-md-10">
		<ol class="breadcrumb">
	        <li><a href="{{ url('/') }}">Inicio</a></li>
	        <li class="active">Personas</a></li>
	    </ol>
		<h3>Personas</h3>
		<a href="{{url('/personas/create')}}" class="btn btn-primary">
			<i class="glyphicon glyphicon-plus"></i> Cargar persona
		</a>
		<hr>
		<table class="table table-condensed table-striped table-hover">
			<thead>
				<tr>
					<th>
						Apellido(s) y Nombre(s)
					</th>
					<th>
						CUIL/CUIT
					</th>
					<th>
						Domicilio
					</th>
					<th>
						Teléfono
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
				@foreach($personas as $persona)
				<tr>
					<td>
						{{ $persona->apellido }}, {{ $persona->nombre }}
					</td>
					<td>
						{{ $persona->cuil_cuit }}
					</td>
					<td>
						{{ $persona->domicilio }}
					</td>
					<td>
						{{ $persona->telefono }}
					</td>
					<td>
						{{ Carbon\Carbon::parse($persona->fecha_carga)->format('d/m/Y') }}
					</td>
					<td>
						<div class="btn-group">
							<a href="{{ route('personas.show', $persona->id) }}" class="btn btn-inverse" title="Ver"><i class="glyphicon glyphicon-eye-open"></i> Ver</a>
	                        <a href="{{ route('personas.edit', $persona->id) }}" class="btn btn-inverse" title="Editar"><i class="glyphicon glyphicon-edit"></i> Editar</a>

	                        <?= Former::open()
	                        ->class('btn-group')
	                        ->method('delete')
	                        ->route('personas.destroy', $persona->id) ?>

	                        {{ csrf_field() }}

	                        <?= Former::button()
	                        ->type('submit')
	                        ->value('<i class="glyphicon glyphicon-trash"></i> Eliminar')
	                        ->class('btn btn-danger') ?>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection