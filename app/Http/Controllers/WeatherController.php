<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index(Request $request)
    {
        $city = $request->input('city', 'Joinville,BR'); 
        $apiKey = config('services.weather.key');
        $apiUrl = config('services.weather.url');

        $response = Http::get("{$apiUrl}weather", [
            'q' => $city,
            'appid' => $apiKey,
            'units' => 'metric', 
            'lang' => 'pt_br',   
        ]);

        if ($response->successful()) {
            $weatherData = $response->json();
            return view('weather', ['weather' => $weatherData]);
        }

        return view('weather', ['error' => 'Cidade não encontrada ou erro na API.']);
    }
}