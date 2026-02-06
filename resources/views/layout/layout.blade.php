<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    {{-- @if(url()->current() == 'backoffice')
        <link rel="stylesheet" href="styleBackOffice.css">
    @else
        <link rel="stylesheet" href="styleNormal.css">
    @endif --}}
    <link rel="stylesheet" href="/styles/style.css">
</head>
<body class="fade-up">
    @include('partials.nav')
    @yield('content')
    @include('partials.footer')
</body>
</html>
