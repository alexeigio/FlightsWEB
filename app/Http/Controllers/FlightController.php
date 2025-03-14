<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FlightController extends Controller
{
    public function index(Request $request)
    {

        $searchParams = $request->only(['origin', 'destination', 'departure_date', 'airport']);

        $response = Http::get('http://localhost:3000/api/flights', $searchParams);

        if (!$response->successful()) {
            return back()->withError('Error al obtener los vuelos.');
        }

        $flights = $response->json();

        if ($request->ajax()) {
            return view('pages.home', compact('flights'))->renderSections()['flightsResults'];
        }


        return view('pages.home', compact('flights'));
    }



    public function reservations()
    {
        $reservations = [];

        return view('pages.reservations', compact('reservations'));
    }
}
