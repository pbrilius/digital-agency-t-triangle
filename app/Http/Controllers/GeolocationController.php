<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Geolocation;
use App\Services\GpsDevice;

class GeolocationController extends Controller
{
    /**
     * GPS device service
     * @var GpsDevice
     */
    public $gpsDevice;

/**
     * Default constructor w\ service provider
     * @param GpsDevice $gpsDevice  geolocation calculator &* computer
     */
    public function __construct(GpsDevice $gpsDevice)
    {
        $this->gpsDevice = $gpsDevice;
    }

    public function webSolution()
    {
        $gpsDevice = $this->gpsDevice;

        $geolocations = Geolocation::all()->toArray();
        $calculatedDistances = $gpsDevice->calculateDistances($geolocations);

        $gpsDevice->computeFilter($calculatedDistances);

        return view('web-solution', [
            'computedFilters' => $gpsDevice->getFilteredVariables(),
        ]);
    }
}
