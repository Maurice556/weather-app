<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\WeatherController;

class WeatherApiController extends Controller
{
    protected $weatherController;

    public function __construct()
    {
        $this->weatherController = new WeatherController();
    }

    /**
     * Get weather data for a city
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function getWeather(Request $request): JsonResponse
    {
        $request->validate([
            'city' => 'required|string|min:2|max:100',
            'unit' => 'sometimes|in:metric,imperial'
        ]);

        try {
            $city = $request->query('city');
            $unit = $request->query('unit', 'metric');
            
            $weatherData = $this->weatherController->getWeatherData($city, $unit);

            return response()->json([
                'success' => true,
                'data' => $weatherData,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'City not found',
            ], 404);
        }
    }

    /**
     * Get weather for multiple cities
     * 
     * @param Request $request
     * @return JsonResponse
     */
    public function getMultipleCities(Request $request): JsonResponse
    {
        $request->validate([
            'cities' => 'required|array|min:1|max:10',
            'cities.*' => 'string|min:2|max:100',
            'unit' => 'sometimes|in:metric,imperial'
        ]);

        try {
            $cities = $request->input('cities');
            $unit = $request->input('unit', 'metric');
            $weatherData = [];

            foreach ($cities as $city) {
                $data = $this->weatherController->getWeatherData($city, $unit);
                $weatherData[$city] = $data;
            }

            return response()->json([
                'success' => true,
                'data' => $weatherData,
                'count' => count($weatherData),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Error fetching weather data',
            ], 500);
        }
    }
}
