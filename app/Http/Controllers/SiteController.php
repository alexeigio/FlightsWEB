<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return view('pages.home');
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
