@extends('layout.layout')

@section('title')
    Gestionar Usuarios - VITALITY
@endsection

@section('content')

<div class="users-list-container">
    <h1>GESTIONAR USUARIOS</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="users-table-wrapper">
        @if ($users->count() > 0)
            <table class="users-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Miembro desde</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="role-badge {{ $user->rol === 'admin' ? 'role-admin' : 'role-user' }}">
                                    {{ ucfirst($user->rol) }}
                                </span>
                            </td>
                            <td>{{ $user->created_at->format('d/m/Y') }}</td>
                            <td class="actions">
                                @if (auth()->user()->id !== $user->id)
                                    <button class="btn-action btn-edit">Editar</button>
                                    <button class="btn-action btn-delete">Eliminar</button>
                                @else
                                    <span class="text-muted">Sin acciones</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="no-users">No hay usuarios registrados.</p>
        @endif
    </div>
</div>

@endsection
