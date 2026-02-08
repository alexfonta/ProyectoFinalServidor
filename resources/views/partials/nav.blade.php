<nav class="navbar">
    <div class="nav-left">
        <a href="{{route('index')}}" class="nav-logo">
            <img src="/images/vitalityLogoBackGround.png" alt="logo" class="logo" id="logonav">
        </a>
        <h1 class="nav-brand">TEAM VITALITY</h1>
        <a href="{{route('index')}}" class="nav-link">Inicio</a>

        @auth
            <a href="{{route('events.index')}}" class="nav-link">Eventos</a>
            <a href="{{route('players.index')}}" class="nav-link">Jugadores</a>
            <a href="{{route('players.create')}}" class="nav-link">Añadir Jugador</a>

            @if(auth()->user()->rol === 'admin')
                <a href="{{route('users.list')}}" class="nav-link nav-admin">Usuarios</a>
            @endif
        @endauth
    </div>

    <div class="nav-right">
        @auth
            <div class="nav-user-info">
                <span class="user-name">{{ auth()->user()->name }}</span>
                @if(auth()->user()->rol === 'admin')
                    <span class="user-role admin">Admin</span>
                @else
                    <span class="user-role user">Usuario</span>
                @endif
            </div>
            <a href="{{route('account')}}" class="nav-link">Mi Perfil</a>
            <form action="{{ route('logout') }}" method="POST" class="nav-logout-form">
                @csrf
                <button type="submit" class="btn-logout">Cerrar Sesión</button>
            </form>
        @else
            <a href="{{route('login.show')}}" class="nav-link">Iniciar Sesión</a>
            <a href="{{route('signup.show')}}" class="nav-link nav-signup">Registrarse</a>
        @endauth
    </div>
</nav>
