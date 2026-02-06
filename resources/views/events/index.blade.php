@extends('layout.layout')

@section('title')
    Eventos
@endsection

@section('content')
    <h2>Lista de Eventos:</h2> <br>

    @foreach ($events as $event)
        <b>{{$event->name}}</b> <b>{{$event->date}}</b>  <br>
    @endforeach

    <a href="{{route('events.create')}}">Crear Nuevo Evento</a> <br>

@endsection
