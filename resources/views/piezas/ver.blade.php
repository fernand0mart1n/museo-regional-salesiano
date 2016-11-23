@extends('layouts.layout')

@section('titulo', ' - ' . $pieza->descripcion)

@section('head')

    @include('layouts.librerias')
    <style type="text/css">
        .thumb {
            margin-bottom: 30px;
        }
    </style>

@endsection

@section('navbar')

    @include('layouts.app')

    @section('content')
    
        <div class="col-lg-12">
            <h3 class="text-center">{{ $pieza->descripcion }}</h3>
        </div>
        @foreach($pieza->fotos as $foto)
            <div class="col-lg-3 thumb">
                <a class="thumbnail" href="/storage/{{ $foto->foto }}" target="_blank">
                    <img class="img-responsive" src="/storage/{{ $foto->foto }}" alt="">
                </a>
            </div>
        @endforeach
        <a href="{{ route('piezas.index') }}" class="btn btn-default">
            <i class="glyphicon glyphicon-chevron-left"></i> Volver
        </a>
    @endsection
@endsection