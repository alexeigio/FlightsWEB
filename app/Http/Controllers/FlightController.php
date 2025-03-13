<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FlightController extends Controller
{
    public function index()
    {
        $response = Http::get('http://localhost:3000/api/flights');
        $flights = $response->object();
        return view('pages.reservations', compact('flights'));
    }

    public function search(Request $request)
    {
        try {
            Log::info('Iniciando búsqueda de vuelos', $request->all());
            
            // Obtener todos los vuelos
            $response = Http::get('http://localhost:3000/api/flights');
            $allFlights = $response->object();
            
            // Filtrar los vuelos según los criterios de búsqueda
            $filteredFlights = collect($allFlights)->filter(function($flight) use ($request) {
                $matches = true;
                
                if ($request->filled('origin') && strtolower($flight->origin) !== strtolower($request->origin)) {
                    $matches = false;
                }
                
                if ($request->filled('destination') && strtolower($flight->destination) !== strtolower($request->destination)) {
                    $matches = false;
                }
                
                if ($request->filled('airport') && strtolower($flight->airport) !== strtolower($request->airport)) {
                    $matches = false;
                }
                
                if ($request->filled('departure_date')) {
                    $flightDate = \Carbon\Carbon::parse($flight->departure_datetime)->format('Y-m-d');
                    if ($flightDate !== $request->departure_date) {
                        $matches = false;
                    }
                }
                
                return $matches;
            })->values();

            Log::info('Vuelos encontrados:', ['count' => $filteredFlights->count()]);
            return response()->json($filteredFlights);
            
        } catch (\Exception $e) {
            Log::error('Error al buscar vuelos: ' . $e->getMessage());
            return response()->json([], 500);
        }
    }

    public function reservations()
    {
        $reservations = []; // Asegúrate de inicializarlo como un array

        return view('pages.reservations', compact('reservations'));
    }
}
