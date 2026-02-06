@extends('layout.layout')

@section('title')
    Players
@endsection()

@section('content')
    <h2>Lista de integrantes del Equipo Vitality:</h2>

    @foreach ($players as $player)
        <div id="jugadoresContainer">
            <a href="{{route('players.show', $player)}}"><b>{{$player->name}}</b></a>
            @if($player->photo)
                <img class="imgPlayer" src="/storage/{{$players->photo}}" alt="{{$player->name }}" id="presentationPhoto">
            @endif
        </div>
    @endforeach

@endsection
