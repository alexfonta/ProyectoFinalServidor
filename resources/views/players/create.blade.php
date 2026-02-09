@extends('layout.layout')

@section('title')
    CreatePlayers
@endsection

@section('content')
<div class="players-create-container">
    <h1 class="page-title">AÑADIR JUGADOR</h1>
    <p class="lead">Completa el formulario para añadir un nuevo jugador al equipo.</p>

    <form action="{{ route('players.store') }}" method="POST" class="players-form" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre completo" required>
            @error('name') <span class="error-message">{{ $message }}</span> @enderror
        </div>

        <div class="form-row">
            <div class="form-group col">
                <label for="twitter">Twitter</label>
                <input type="text" id="twitter" name="twitter" value="{{ old('twitter') }}" class="form-control" placeholder="@usuario">
                @error('twitter') <span class="error-message">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col">
                <label for="instagram">Instagram</label>
                <input type="text" id="instagram" name="instagram" value="{{ old('instagram') }}" class="form-control" placeholder="@usuario">
                @error('instagram') <span class="error-message">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col">
                <label for="twitch">Twitch</label>
                <input type="text" id="twitch" name="twitch" value="{{ old('twitch') }}" class="form-control" placeholder="@usuario">
                @error('twitch') <span class="error-message">{{ $message }}</span> @enderror
            </div>
            <div class="form-group col">
                <label for="age">Edad</label>
                <input type="number" id="age" name="age" value="{{ old('age') }}" class="form-control" min="10" max="100">
                @error('age') <span class="error-message">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="role">Rol</label>
            <input type="text" id="role" name="role" value="{{ old('role') }}" class="form-control" placeholder="Ej: Delantero, Defensa, MedioCentro">
            @error('role') <span class="error-message">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="photo">Foto</label>
            <input type="file" id="photo" name="photo" class="form-control-file">
            @error('photo') <span class="error-message">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="visible">Visible</label>
            <input type="checkbox" id="visible" name="visible" value="1" {{ old('visible') ? 'checked' : '' }}>
            @error('visible') <span class="error-message">{{ $message }}</span> @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">Crear jugador</button>
            <a href="{{ route('players.index') }}" class="btn-cancel">Cancelar</a>
        </div>
    </form>
</div>
@endsection
