<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SiteController extends Controller
{
    public function index()
    {
        try {
            $response = Http::get('http://localhost:3000/api/flights');
            $flights = $response->object();
        } catch (\Exception $e) {
            $flights = [];
        }

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
