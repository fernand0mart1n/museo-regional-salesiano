@include('layouts.app')

@extends('layouts.layout')

@include('layouts.librerias')

@section('content')
	<div class="col-md-offset-1 col-md-10">
		<ol class="breadcrumb">
	        <li><a href="{{ url('home') }}">Inicio</a></li>
	        <li><a href="{{ route('fondos.index') }}">Fondos</a></li>
	        <li class="active">Fondo {{ $fondo->id }}</li>
	    </ol>
	    <div class="page-header text-center">
	        <h1>
	            Fondo {{ $fondo->id }}<small>.</small>
	        </h1>
	    </div>
	    <form class="form-horizontal">
	        <div class="form-group">
	            <label for="descripcion" class="col-sm-3 control-label">Descripción</label>
	            <div class="col-sm-8">
	                <input type="text" class="form-control" id="descripcion" placeholder="{{ $fondo->descripcion }}" readonly>
	            </div>
	        </div>
	        <div class="form-group">
	            <label for="user" class="col-sm-3 control-label">Usuario</label>
	            <div class="col-sm-8">
	                <input type="text" class="form-control" id="user" placeholder="{{ $fondo->user->name }}" readonly>
	            </div>
	        </div>
	        <div class="form-group">
	            <label for="fondo_carga" class="col-sm-3 control-label">Fecha de carga</label>
	            <div class="col-sm-8">
	                <input type="date" class="form-control" id="fondo_carga" placeholder="{{ $fondo->fondo_carga }}" readonly>
	            </div>
	        </div>
	        <div class="form-group">
	            <div class="col-sm-offset-3 col-sm-8">
	                <a href="{{ route('fondos.index') }}" class="btn btn-default"> Volver</a>
	                <a href="{{ route('fondos.edit', $fondo->id) }}" class="btn btn-primary pull-right"> Editar</a>
	            </div>
	        </div>
	    </form>
	</div>
@stop