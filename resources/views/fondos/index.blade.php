@extends('layouts.layout')

@section('titulo', ' - Listado de fondos')

@section('head')

	@include('layouts.librerias')

@endsection

@section('navbar')
	
	@include('layouts.app')

	@section('content')
	<ol class="breadcrumb">
        <li><a href="{{ url('/') }}">Inicio</a></li>
        <li class="active">Fondos</a></li>
    </ol>
	<h3>Fondos</h3>
	<a href="{{url('/fondos/create')}}" class="btn btn-primary">
		<i class="glyphicon glyphicon-plus"></i> Cargar fondo
	</a>
	<hr>
	<table class="table table-condensed table-striped table-hover">
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
			@foreach($fondos as $fondo)
			<tr>
				<td>
					{{ $fondo->descripcion }}
				</td>
				<td>
					{{ $fondo->user->name }}
				</td>
				<td>
					{{ Carbon\Carbon::parse($fondo->fecha_carga)->format('d/m/Y') }}
				</td>
				<td>
					<div class="btn-group">
						<a href="{{ route('fondos.show', $fondo->id) }}" class="btn btn-inverse" title="Ver"><i class="glyphicon glyphicon-eye-open"></i> Ver</a>
                        <a href="{{ route('fondos.edit', $fondo->id) }}" class="btn btn-inverse" title="Editar"><i class="glyphicon glyphicon-edit"></i> Editar</a>

                        <?= Former::open()
                        ->class('btn-group')
                        ->method('delete')
                        ->route('fondos.destroy', $fondo->id) ?>

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