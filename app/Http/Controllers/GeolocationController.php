<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Geolocation;

class GeolocationController extends Controller
{
    public function webSolution()
    {
        $geolocations = Geolocation::all();

        return view('web-solution');
    }
}
