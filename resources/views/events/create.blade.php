@extends('layout.layout')

@section('title')
    Create Events
@endsection

@section('content')

    <form action="{{route('events.store')}}" method="POST">
        @csrf
        <label for="name">Nombre:</label><br>
        <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="nombre"> <br>
        @error('name')<div class="error"> Error: {{$message}}</div> @enderror


        <label for="description">Descripción:</label><br>
        <textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea> <br>
        @error('description')
            <div class="error"> Error: {{ $message }}</div>
        @enderror

        <label for="location">Ubicación:</label> <br>
        <input type="text" name="location" id="location" value="{{old('location')}}" placeholder="ubicación"> <br>
        @error('date')<div class="error"> Error: {{$message}}</div> @enderror

        <label for="date">Fecha:</label> <br>
        <input type="text" name="date" id="date" value="{{old('date')}}" placeholder="fecha"> <br>
        @error('date')<div class="error"> Error: {{$message}}</div> @enderror

        <label for="date">map:</label> <br>
        <input type="text" name="map" id="map" value="{{old('map')}}" placeholder="mapa"> <br>
        @error('mapa')<div class="error"> Error: {{$message}}</div> @enderror

        <label for="hour">Hora:</label> <br>
        <input type="text" name="hour" id="hour" value="{{old('hour')}}" placeholder="hora"> <br>
        @error('hour')<div class="error"> Error: {{$message}}</div> @enderror

        <label for="type">Tipo:</label> <br>
        <select name="type" id="type">
            <option value="" disabled selected>Selecciona una opción</option>
            <option value="official">Oficial</option>
            <option value="exhibition">Exhibición</option>
            <option value="charity">Caridad</option>
        </select>
        <br>
        @error('type')<div class="error"> Error: {{$message}}</div> @enderror

        <label for="tags">Tags:</label> <br>
        <input type="text" name="tags" id="tags" value="{{old('tags')}}" placeholder="tags"> <br>
        @error('tags')<div class="error"> Error: {{$message}}</div> @enderror

        <label for="visible">Visible:</label> <br>
        <input type="checkbox" name="visible" id="visible" value="1" {{ old('visible') ? 'checked' : '' }}> <br>
        @error('visible')<div class="error"> Error: {{$message}}</div> @enderror <br>

        <input type="submit" value="Enviar">
        <input type="reset" value="Borrar">
    </form>
    @foreach ($errors as $error)
        {{$error}} <br>
    @endforeach
@endsection
