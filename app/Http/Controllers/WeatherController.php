<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    private $apiKey = 'demo'; // Default demo key, can be replaced with actual API key
    private $baseUrl = 'https://api.openweathermap.org/data/2.5';

    public function index(Request $request)
    {
        $city = $request->query('city', 'London');
        $weather = null;
        $error = null;
        $unit = $request->query('unit', 'metric');
        $weatherEmoji = '🌤️';

        if ($city) {
            try {
                $weather = $this->getWeatherData($city, $unit);
                if ($weather) {
                    $weatherEmoji = $this->getWeatherEmoji($weather['weather'][0]['main']);
                }
            } catch (\Exception $e) {
                $error = 'City not found. Please try another location.';
            }
        }

        return view('weather', [
            'weather' => $weather,
            'city' => $city,
            'error' => $error,
            'unit' => $unit,
            'temperatureUnit' => $unit === 'metric' ? '°C' : '°F',
            'weatherEmoji' => $weatherEmoji,
        ]);
    }

    public function getWeatherData($city, $unit = 'metric')
    {
        // For demo purposes, we'll use mock data
        // In production, replace apiKey with your actual OpenWeatherMap API key
        $mockData = $this->getMockWeatherData($city, $unit);
        return $mockData;
    }

    private function getMockWeatherData($city, $unit = 'metric')
    {
        $weatherConditions = [
            ['main' => 'Clear', 'description' => 'clear sky', 'icon' => '01d'],
            ['main' => 'Clouds', 'description' => 'scattered clouds', 'icon' => '03d'],
            ['main' => 'Rain', 'description' => 'light rain', 'icon' => '10d'],
            ['main' => 'Thunderstorm', 'description' => 'thunderstorm with light rain', 'icon' => '11d'],
            ['main' => 'Snow', 'description' => 'light snow', 'icon' => '13d'],
        ];

        $currentCondition = $weatherConditions[array_rand($weatherConditions)];
        
        return [
            'name' => ucfirst($city),
            'country' => 'GB',
            'main' => [
                'temp' => $unit === 'metric' ? rand(5, 25) : rand(40, 77),
                'feels_like' => $unit === 'metric' ? rand(3, 23) : rand(37, 73),
                'temp_min' => $unit === 'metric' ? rand(2, 20) : rand(35, 68),
                'temp_max' => $unit === 'metric' ? rand(8, 28) : rand(46, 82),
                'pressure' => rand(1000, 1020),
                'humidity' => rand(40, 90),
            ],
            'weather' => [$currentCondition],
            'wind' => [
                'speed' => rand(2, 15),
                'deg' => rand(0, 360),
            ],
            'clouds' => ['all' => rand(0, 100)],
            'visibility' => rand(8000, 10000),
            'timezone' => 0,
            'sunrise' => strtotime('today') + (rand(5, 7) * 3600),
            'sunset' => strtotime('today') + (rand(18, 20) * 3600),
        ];
    }

    public function getWeatherEmoji($weatherMain)
    {
        return match($weatherMain) {
            'Clear' => '☀️',
            'Clouds' => '☁️',
            'Rain' => '🌧️',
            'Drizzle' => '🌦️',
            'Thunderstorm' => '⛈️',
            'Snow' => '❄️',
            'Mist', 'Smoke', 'Haze', 'Dust', 'Fog', 'Sand', 'Ash', 'Squall', 'Tornado' => '🌫️',
            default => '🌤️',
        };
    }
}
