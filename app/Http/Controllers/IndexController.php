<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('index');
    }

    /**
     * Mostrar la página "Dónde estamos" con el mapa.
     */
    public function where(Request $request)
    {
        $lat = config('location.lat', '39.4702');
        $lng = config('location.lng', '-0.3768');
        $place = config('location.place', 'Nuestra Sede');
        return view('where', compact('lat', 'lng', 'place'));
    }
}
