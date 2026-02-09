@extends('layout.layout')

@section('title')
    Editar Jugador - VITALITY
@endsection

@section('content')

<div class="players-edit-container">
    <h1>EDITAR JUGADOR</h1>

    <form action="{{ route('players.update', $player->id) }}" method="POST" class="players-form" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $player->name) }}" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="twitter">Twitter:</label>
            <input type="text" id="twitter" name="twitter" value="{{ old('twitter', $player->twitter) }}">
            @error('twitter')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="instagram">Instagram:</label>
            <input type="text" id="instagram" name="instagram" value="{{ old('instagram', $player->instagram) }}">
            @error('instagram')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="twitch">Twitch:</label>
            <input type="text" id="twitch" name="twitch" value="{{ old('twitch', $player->twitch) }}">
            @error('twitch')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="photo">Foto del jugador:</label>
            <input type="file" id="photo" name="photo">
            @error('photo')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="age">Edad:</label>
            <input type="text" id="age" name="age" value="{{ old('age', $player->age) }}">
            @error('age')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="role">Rol:</label>
            <input type="text" id="role" name="role" value="{{ old('role', $player->role) }}" required>
            @error('role')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="visible">Visible:</label>
            <input type="checkbox" id="visible" name="visible" value="1" {{ old('visible', $player->visible) ? 'checked' : '' }}>
            @error('visible')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">Guardar cambios</button>
            <a href="{{ route('players.show', $player->id) }}" class="btn-cancel">Cancelar</a>
        </div>
    </form>
</div>

@endsection
