@extends('layout.layout')

@section('title')
    Editar Usuario - VITALITY
@endsection

@section('content')

<div class="users-edit-container">
    <h1>EDITAR USUARIO</h1>

    <form action="{{ route('users.update', $user) }}" method="POST" class="users-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="rol">Rol:</label>
            <select id="rol" name="rol" required>
                <option value="member" {{ old('rol', $user->rol) === 'member' ? 'selected' : '' }}>Member</option>
                <option value="admin" {{ old('rol', $user->rol) === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="shop" {{ old('rol', $user->rol) === 'shop' ? 'selected' : '' }}>Shop</option>
            </select>
            @error('rol')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">Guardar cambios</button>
            <a href="{{ route('users.list') }}" class="btn-cancel">Cancelar</a>
        </div>
    </form>
</div>

@endsection
