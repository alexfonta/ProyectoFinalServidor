<?php

return [
    // Coordenadas por defecto (Valencia, España) — cámbialas según necesites
    'lat' => env('MAP_LAT', '39.4702'),
    'lng' => env('MAP_LNG', '-0.3768'),
    'place' => env('MAP_PLACE', 'Nuestra Sede'),
    // Si quieres usar la API JS de Google, pon aquí la clave en .env
    'google_api_key' => env('GOOGLE_MAPS_API_KEY', ''),
];
