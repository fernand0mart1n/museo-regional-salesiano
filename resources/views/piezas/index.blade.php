@extends('layouts.layout')

@section('titulo', ' - Listado de piezas')

@section('head')

	@include('layouts.librerias')

@endsection

@section('navbar')

	@include('layouts.app')

	@section('content')
	<ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Inicio</a></li>
        <li class="active">Piezas</a></li>
    </ol>
	<h3>Piezas</h3>
	<a href="{{url('/piezas/create')}}" class="btn btn-primary">
		<i class="glyphicon glyphicon-plus"></i> Cargar pieza
	</a>
	<hr>
	<table class="table table-condensed table-striped table-hover">
		<thead>
			<tr>
				<th>
					Descripción
				</th>
				<th>
					Clasificación
				</th>
				<th>
					Procedencia
				</th>
				<th>
					Autor
				</th>
				<th>
					Fecha de ejecución
				</th>
				<th>
					Tema
				</th>
				<th>
					Observación
				</th>
				<th>
					Acciones
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach($piezas as $pieza)
			<tr>
				<td>
					{{ $pieza->descripcion }}
				</td>
				<td>
					{{ $pieza->clasif->descripcion }}
				</td>
				<td>
					{{ $pieza->procedencia }}
				</td>
				<td>
					{{ $pieza->autor }}
				</td>
				<td>
					{{ Carbon\Carbon::parse($pieza->fecha_ejecucion)->format('d/m/Y') }}
				</td>
				<td>
					{{ $pieza->tema }}
				</td>
				<td>
					{{ $pieza->observacion }}
				</td>
				<td>
					<div class="btn-group">
						<a href="{{ route('piezas.show', $pieza->id) }}" class="btn btn-inverse" title="Ver"><i class="glyphicon glyphicon-eye-open"></i> Ver</a>
                        <a href="{{ route('piezas.edit', $pieza->id) }}" class="btn btn-inverse" title="Editar"><i class="glyphicon glyphicon-edit"></i> Editar</a>

                        <?= Former::open()
                        ->class('btn-group')
                        ->method('delete')
                        ->route('piezas.destroy', $pieza->id) ?>

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
	@endsection
@endsection