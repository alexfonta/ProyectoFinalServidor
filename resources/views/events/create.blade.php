@extends('layout.layout')

@section('title')
    Create Events
@endsection

@section('content')

    <div class="events-create-container">
        <h1 class="page-title">Crear evento</h1>
        <p class="lead">Rellena los datos del evento y pulsa "Crear evento".</p>

        <form action="{{ route('events.store') }}" method="POST" class="events-form">
            @csrf

            <div class="form-group">
                <label for="name">Nombre</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    class="form-control @error('name') is-invalid @enderror"
                    placeholder="Nombre del evento"
                    required
                >
                @error('name') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea
                    id="description"
                    name="description"
                    rows="5"
                    class="form-control @error('description') is-invalid @enderror"
                    placeholder="Descripción breve del evento"
                >{{ old('description') }}</textarea>
                @error('description') <span class="error-message">{{ $message }}</span> @enderror
            </div>

            <div class="form-row">
                <div class="form-group col">
                    <label for="location">Ubicación</label>
                    <input type="text" id="location" name="location" value="{{ old('location') }}" class="form-control" placeholder="Ciudad / Lugar">
                    @error('location') <span class="error-message">{{ $message }}</span> @enderror
                </div>
                <div class="form-group col">
                    <label for="date">Fecha</label>
                    <input type="date" id="date" name="date" value="{{ old('date') }}" class="form-control">
                    @error('date') <span class="error-message">{{ $message }}</span> @enderror
                </div>
                <div class="form-group col">
                    <label for="hour">Hora</label>
                    <input type="time" id="hour" name="hour" value="{{ old('hour') }}" class="form-control">
                    @error('hour') <span class="error-message">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col">
                    <label for="type">Tipo</label>
                    <select id="type" name="type" class="form-control">
                        <option value="" disabled {{ old('type') ? '' : 'selected' }}>Selecciona una opción</option>
                        <option value="official" {{ old('type') === 'official' ? 'selected' : '' }}>Oficial</option>
                        <option value="exhibition" {{ old('type') === 'exhibition' ? 'selected' : '' }}>Exhibición</option>
                        <option value="charity" {{ old('type') === 'charity' ? 'selected' : '' }}>Caridad</option>
                    </select>
                    @error('type') <span class="error-message">{{ $message }}</span> @enderror
                </div>

                <div class="form-group col">
                    <label for="tags">Tags</label>
                    <input type="text" id="tags" name="tags" value="{{ old('tags') }}" class="form-control" placeholder="Separados por comas">
                    @error('tags') <span class="error-message">{{ $message }}</span> @enderror
                </div>

                <div class="form-group col visible-col">
                    <label for="visible">Visible</label>
                    <div class="checkbox-field">
                        <input type="checkbox" id="visible" name="visible" value="1" {{ old('visible') ? 'checked' : '' }}>
                    </div>
                    @error('visible') <span class="error-message">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Crear evento</button>
                <a href="{{ route('events.index') }}" class="btn-cancel">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
