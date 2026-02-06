@extends('layout.layout')

@section('title')
    CreatePlayers
@endsection

@section('content')
    <h3>Aqui se mostrará el formulario para añadir un jugador:</h3>

    <form action="{{route('players.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Nombre:</label><br>
        <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="nombre"> <br>
        @error('name')<div class="error"> Error: {{$message}}</div> @enderror

        <label for="twitter">Twitter</label> <br>
        <input type="text" name="twitter" id="twitter" value="{{old('twitter')}}" placeholder="twitter"> <br>
        @error('twitter')<div class="error"> Error: {{$message}}</div> @enderror

        <label for="instagram">Instagram</label><br>
        <input type="text" name="instagram" id="instagram" value="{{old('instagram')}}" placeholder="instagram"><br>
        @error('instagram')<div class="error"> Error: {{$message}}</div> @enderror

        <label for="twitch">Twitch:</label> <br>
        <input type="text" name="twitch" id="twitch" value="{{old('twitch')}}" placeholder="twitch"> <br>
        @error('twitch')<div class="error"> Error: {{$message}}</div> @enderror

        <label for="photo">Foto del jugador:</label><br>
        <input type="file" name="photo" id="photo"><br>
        @error('photo')<div class="error"> Error: {{$message}}</div> @enderror

        <label for="visible">Visible:</label> <br>
        <input type="checkbox" name="visible" id="visible" value="1" {{ old('visible') ? 'checked' : '' }}> <br>
        @error('visible')<div class="error"> Error: {{$message}}</div> @enderror

        <label for="age">Edad:</label> <br>
        <input type="text" name="age" id="age" value="{{old('age')}}"> <br>
        @error('age')<div class="error"> Error: {{$message}}</div> @enderror

        <label for="role">Rol:</label> <br>
        <input type="text" name="role" id="role" value="{{old('role')}}"> <br>
        @error('role')<div class="error"> Error: {{$message}}</div> @enderror

        <input type="submit" value="Enviar">
        <input type="reset" value="Borrar">
    </form>
@endsection
