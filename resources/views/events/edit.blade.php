@extends('layout.layout')

@section('title')
    Editar Evento - VITALITY
@endsection

@section('content')

<div class="events-edit-container">
    <h1>EDITAR EVENTO</h1>

    <form action="{{ route('events.update', $event->id) }}" method="POST" class="events-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $event->name) }}" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea id="description" name="description" rows="10" required>{{ old('description', $event->description) }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="location">Ubicación:</label>
            <input type="text" id="location" name="location" value="{{ old('location', $event->location) }}" required>
            @error('location')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="date">Fecha:</label>
            <input type="text" id="date" name="date" value="{{ old('date', $event->date) }}" required>
            @error('date')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="map">Mapa:</label>
            <input type="text" id="map" name="map" value="{{ old('map', $event->map) }}" required>
            @error('map')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="hour">Hora:</label>
            <input type="text" id="hour" name="hour" value="{{ old('hour', $event->hour) }}" required>
            @error('hour')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="type">Tipo:</label>
            <select id="type" name="type" required>
                <option value="official" {{ old('type', $event->type) === 'official' ? 'selected' : '' }}>Oficial</option>
                <option value="exhibition" {{ old('type', $event->type) === 'exhibition' ? 'selected' : '' }}>Exhibición</option>
                <option value="charity" {{ old('type', $event->type) === 'charity' ? 'selected' : '' }}>Caridad</option>
            </select>
            @error('type')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tags">Tags:</label>
            <input type="text" id="tags" name="tags" value="{{ old('tags', $event->tags) }}" required>
            @error('tags')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="visible">Visible:</label>
            <input type="checkbox" id="visible" name="visible" value="1" {{ old('visible', $event->visible) ? 'checked' : '' }}>
            @error('visible')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">Guardar cambios</button>
            <a href="{{ route('events.show', $event->id) }}" class="btn-cancel">Cancelar</a>
        </div>
    </form>
</div>

@endsection

