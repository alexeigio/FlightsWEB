<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FlightController extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:3000/api/flights');
        $flights = $response->object();
        return view('pages.reservations', compact('flights'));
    }

    public function reservations()
    {
        $reservations = []; // Asegúrate de inicializarlo como un array

        return view('pages.reservations', compact('reservations'));
    }
}
