@extends('layout.layout')

@section('title')
    Players
@endsection()

@section('content')
    <h2>Lista de integrantes del Equipo Vitality:</h2>

    @foreach ($players as $player)
        <div class="playerCard">
            @if($player->photo)
                <img class="playerPhoto" src="/storage/{{$player->photo }}" alt="{{$player->name}} ">
            @endif
            <a href="{{route('players.show', $player)}}" class="playerName"><b>{{$player->name}}</b></a>
        </div>
    @endforeach

@endsection
