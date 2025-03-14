<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SiteController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\Flight::query();

        // Filtrar por origen
        if ($request->has('origin') && !empty($request->origin)) {
            $query->where('origin', 'LIKE', '%' . $request->origin . '%');
        }

        // Filtrar por destino
        if ($request->has('destination') && !empty($request->destination)) {
            $query->where('destination', 'LIKE', '%' . $request->destination . '%');
        }

        // Filtrar por fecha de salida
        if ($request->has('departure_date') && !empty($request->departure_date)) {
            $query->whereDate('departure_datetime', $request->departure_date);
        }

        // Filtrar por aeropuerto
        if ($request->has('airport') && !empty($request->airport)) {
            $query->where('airport', 'LIKE', '%' . $request->airport . '%');
        }

        // Obtener los vuelos filtrados
        $flights = $query->get();

        return view('pages.home', compact('flights'));
    }

    public function reservations()
    {
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->get('http://localhost:3000/api/flights');
            $flights = json_decode($response->getBody(), true);

            if (!is_array($flights)) {
                $flights = [];
            }
        } catch (\Exception $e) {
            \Log::error('Error al obtener vuelos: ' . $e->getMessage());
            $flights = [];
        }

        return view('pages.reservations', compact('flights'));
    }
}
