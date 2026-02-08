@extends('layout.layout')

@section('title')
    Eventos
@endsection

@section('content')
    <div class="events-container">
        <h1>Próximos Eventos</h1>

        @auth
            @if(auth()->user()->rol === 'admin')
                <p><a class="create-event-btn" href="{{ route('events.create') }}">+ Crear Nuevo Evento</a></p>
            @endif
        @endauth

        @if ($events->count() > 0)
            <div class="events-list">
                @foreach ($events as $event)
                    <div class="event-card">
                        <h3>
                            <a href="{{ route('events.show', $event) }}">{{ $event->name }}</a>
                        </h3>
                        <p><strong>Fecha:</strong> {{ $event->date }}</p>
                        <p><strong>Hora:</strong> {{ $event->hour }}</p>
                        <p><strong>Tipo:</strong> {{ ucfirst($event->type) }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p>No hay eventos próximos.</p>
        @endif

        {{-- link moved above for visibility --}}
    </div>
@endsection
