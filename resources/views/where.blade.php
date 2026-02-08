@extends('layout.layout')

@section('title')
    Dónde estamos
@endsection

@section('content')
    <h2>Dónde estamos — {{ $place }}</h2>

    <p>Coordenadas: {{ $lat }}, {{ $lng }}</p>

    {{-- Iframe embebido de Google Maps (fácil) -- usar coordenadas desde config --}}
    <div style="width:100%;height:500px;">
        <iframe
            width="100%"
            height="100%"
            frameborder="0"
            style="border:0"
            src="https://www.google.com/maps?q={{ $lat }},{{ $lng }}&hl=es&z=15&output=embed"
            allowfullscreen>
        </iframe>
    </div>

    <p>Si prefieres una integración más avanzada (Google Maps JS API), añade tu clave en el archivo `.env` como `GOOGLE_MAPS_API_KEY` y dime y lo integro.</p>
@endsection
