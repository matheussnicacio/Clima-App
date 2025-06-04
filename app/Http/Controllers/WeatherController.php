<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index()
    {
        return view('weather.index');
    }

    public function getWeather(Request $request)
    {

        $request->validate([
            'city' => 'required|string|max:255'
        ]);

        $city = $request->input('city');
        $apiKey = env('WEATHER_API_KEY');
        $apiUrl = env('WEATHER_API_URL');

        if (!$apiKey) {
            return back()->with('error', 'Chave da API não configurada. Verifique o arquivo .env');
        }

        if (!$apiUrl) {
            return back()->with('error', 'URL da API não configurada. Verifique o arquivo .env');
        }

        try {
            
            $url = "http://api.openweathermap.org/data/2.5/weather?q=" . urlencode($city . ',BR') . "&appid=" . $apiKey . "&units=metric&lang=pt_br";
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

            curl_setopt($ch, CURLOPT_PROXY, '');
            curl_setopt($ch, CURLOPT_NOPROXY, '*');
            
            $responseBody = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);
            
            if ($error) {
                return back()->with('error', 'Erro de conexão: ' . $error);
            }

            if ($httpCode == 200) {
                $weatherData = json_decode($responseBody, true);
                
                if (!$weatherData || !isset($weatherData['main'])) {
                    return back()->with('error', 'Dados inválidos recebidos da API.');
                }
                
                $data = [
                    'city' => $weatherData['name'] ?? $city,
                    'country' => $weatherData['sys']['country'] ?? 'BR',
                    'temperature' => round($weatherData['main']['temp'] ?? 0),
                    'feels_like' => round($weatherData['main']['feels_like'] ?? 0),
                    'description' => ucfirst($weatherData['weather'][0]['description'] ?? 'N/A'),
                    'humidity' => $weatherData['main']['humidity'] ?? 0,
                    'pressure' => $weatherData['main']['pressure'] ?? 0,
                    'wind_speed' => $weatherData['wind']['speed'] ?? 0,
                    'icon' => $weatherData['weather'][0]['icon'] ?? '01d'
                ];

                return view('weather.result', compact('data'));
            } else {
                $errorMessage = 'Erro na API. ';
                if ($httpCode == 401) {
                    $errorMessage = 'Chave da API inválida. ';
                } elseif ($httpCode == 404) {
                    $errorMessage = 'Cidade não encontrada. ';
                } elseif ($httpCode >= 500) {
                    $errorMessage = 'Serviço temporariamente indisponível. ';
                }
                
                return back()->with('error', $errorMessage . 'Código: ' . $httpCode . '. Resposta: ' . substr($responseBody, 0, 200));
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Erro ao buscar dados climáticos: ' . $e->getMessage());
        }
    }
}