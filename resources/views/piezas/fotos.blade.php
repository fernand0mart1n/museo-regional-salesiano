@extends('layouts.layout')

@section('titulo', ' - Subiendo fotos')

@section('head')

  @include('layouts.librerias')

@endsection

@section('navbar')

    @include('layouts.app')
 
    @section('content')

    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Agregar archivos</div>
          <div class="panel-body">
            <form method="POST" action="{{ url('/piezas/fotos', $id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
              
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              
              <?= Former::file('file')
              ->label('Nueva Foto')
              ->class('form-control')
              ->required() ?>
              <div class="form-group">
                <br><a href="{{ route('piezas.index') }}" class="btn btn-default">
                    <i class="glyphicon glyphicon-chevron-left"></i> Volver </a>
                    <button type="submit" class="btn btn-primary pull-right">Enviar <i class="glyphicon glyphicon-envelope"></i></button>
                </div>
              </div>
              </form>
            </div>
        </div>
              </div>
            
   
    @endsection
@endsection
