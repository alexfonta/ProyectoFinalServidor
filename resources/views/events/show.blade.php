@extends('layout.layout')

@section('title')
    EventsShow
@endsection

@section('content')
    <div class="event-detail-container">
        <h1>{{ $event->name }}</h1>

        <div class="event-info">
            <p><strong>Descripción:</strong> {{ $event->description }}</p>
            <p><strong>Fecha:</strong> {{ $event->date }}</p>
            <p><strong>Hora:</strong> {{ $event->hour }}</p>
            <p><strong>Tipo:</strong> {{ ucfirst($event->type) }}</p>
            <p><strong>Ubicación:</strong> {{ $event->location }}</p>
            <p><strong>Etiquetas:</strong> {{ $event->tags }}</p>

            @if($event->map)
                <div class="event-map">
                    {!! $event->map !!}
                </div>
            @endif
        </div>

        <div class="event-actions">
            <a href="{{ route('events.index') }}">← Volver a Eventos</a>

            @auth
                @if(auth()->user()->rol === 'admin')
                    <a href="{{ route('events.edit', $event) }}">Editar</a>
                    <form action="{{ route('events.destroy', $event) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                @endif
            @endauth
        </div>
    </div>
@endsection
