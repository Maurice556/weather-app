# Weather App Configuration Examples

## Environment Variables for Weather API

### Using OpenWeatherMap API

Add these to your `.env` file:

```env
# OpenWeatherMap Configuration
WEATHER_API_PROVIDER=openweathermap
WEATHER_API_KEY=your_api_key_here
WEATHER_API_TIMEOUT=10

# Temperature Unit (metric or imperial)
WEATHER_DEFAULT_UNIT=metric

# Cache Settings
WEATHER_CACHE_ENABLED=true
WEATHER_CACHE_DURATION=600  # 10 minutes in seconds
```

## API Key Instructions

### Getting OpenWeatherMap API Key

1. **Visit** https://openweathermap.org/
2. **Click** "Sign Up" and create an account
3. **Go to** API keys section in your profile
4. **Copy** your Default API Key
5. **Paste** into `.env` as `WEATHER_API_KEY`

### Free Tier Includes

- ✅ Current weather data
- ✅ 5-day forecast
- ✅ Historical data
- ✅ 60 calls/minute limit
- ✅ Geo coordinates support

## Configuration Options

### .env Example

```env
APP_NAME=WeatherApp
APP_ENV=local
APP_KEY=base64:your_key_here
APP_DEBUG=true
APP_URL=http://localhost:8000

# Database (optional for weather app)
DB_CONNECTION=sqlite

# Cache (recommended for API responses)
CACHE_DRIVER=file
CACHE_PREFIX=weather_

# Session
SESSION_DRIVER=cookie

# Weather Configuration
WEATHER_API_KEY=sk_test_your_key_here
WEATHER_API_TIMEOUT=10
WEATHER_DEFAULT_UNIT=metric
WEATHER_CACHE_ENABLED=true
WEATHER_CACHE_DURATION=600
```

## Laravel Configuration

### Create config/weather.php

```php
<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Weather API Configuration
    |--------------------------------------------------------------------------
    */
    
    'api_provider' => env('WEATHER_API_PROVIDER', 'openweathermap'),
    'api_key' => env('WEATHER_API_KEY', ''),
    'timeout' => env('WEATHER_API_TIMEOUT', 10),
    'default_unit' => env('WEATHER_DEFAULT_UNIT', 'metric'),
    
    /*
    |--------------------------------------------------------------------------
    | Caching Configuration
    |--------------------------------------------------------------------------
    */
    
    'cache' => [
        'enabled' => env('WEATHER_CACHE_ENABLED', true),
        'duration' => env('WEATHER_CACHE_DURATION', 600), // 10 minutes
        'prefix' => env('CACHE_PREFIX', 'weather_'),
    ],
    
    /*
    |--------------------------------------------------------------------------
    | API Endpoints
    |--------------------------------------------------------------------------
    */
    
    'endpoints' => [
        'openweathermap' => [
            'current' => 'https://api.openweathermap.org/data/2.5/weather',
            'forecast' => 'https://api.openweathermap.org/data/2.5/forecast',
            'geocoding' => 'https://api.openweathermap.org/geo/1.0/direct',
        ],
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Units Configuration
    |--------------------------------------------------------------------------
    */
    
    'units' => [
        'metric' => [
            'temperature' => '°C',
            'wind_speed' => 'm/s',
            'distance' => 'km',
        ],
        'imperial' => [
            'temperature' => '°F',
            'wind_speed' => 'mph',
            'distance' => 'mi',
        ],
    ],
];
```

## Weather Service Configuration

### Create app/Services/WeatherService.php

```php
<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class WeatherService
{
    private $apiKey;
    private $baseUrl;
    private $timeout;
    private $cacheEnabled;
    private $cacheDuration;
    
    public function __construct()
    {
        $this->apiKey = config('weather.api_key');
        $this->baseUrl = config('weather.endpoints.openweathermap.current');
        $this->timeout = config('weather.timeout');
        $this->cacheEnabled = config('weather.cache.enabled');
        $this->cacheDuration = config('weather.cache.duration');
    }
    
    public function getCurrentWeather($city, $unit = 'metric')
    {
        $cacheKey = "weather_{$city}_{$unit}";
        
        if ($this->cacheEnabled) {
            return Cache::remember($cacheKey, $this->cacheDuration, function () use ($city, $unit) {
                return $this->fetchWeather($city, $unit);
            });
        }
        
        return $this->fetchWeather($city, $unit);
    }
    
    private function fetchWeather($city, $unit)
    {
        $response = Http::timeout($this->timeout)->get($this->baseUrl, [
            'q' => $city,
            'appid' => $this->apiKey,
            'units' => $unit,
        ]);
        
        if ($response->failed()) {
            throw new \Exception('Weather API Error: ' . $response->status());
        }
        
        return $response->json();
    }
}
```

## Production Deployment

### Environment Variables for Production

```env
APP_ENV=production
APP_DEBUG=false

# Use production OpenWeatherMap key
WEATHER_API_KEY=your_production_key_here

# Enable caching in production
WEATHER_CACHE_ENABLED=true
WEATHER_CACHE_DURATION=3600  # 1 hour

# Redis cache (recommended)
CACHE_DRIVER=redis

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
```

## Testing Configuration

### .env.testing

```env
APP_ENV=testing
APP_KEY=base64:testing_key_here
WEATHER_API_KEY=test_key_here
WEATHER_CACHE_ENABLED=false
WEATHER_CACHE_DURATION=0
```

## Docker Configuration

### docker-compose.yml Excerpt

```yaml
version: '3.8'

services:
  app:
    image: php:8.2-fpm
    environment:
      - WEATHER_API_KEY=${WEATHER_API_KEY}
      - WEATHER_DEFAULT_UNIT=metric
      - CACHE_DRIVER=redis
  
  redis:
    image: redis:7-alpine
    ports:
      - "6379:6379"

  nginx:
    image: nginx:alpine
    ports:
      - "80:80"
```

## Monitoring & Logging

### For Weather API Issues

```env
LOG_CHANNEL=stack
LOG_LEVEL=debug

# Log weather API calls
WEATHER_LOG_API_CALLS=true
WEATHER_LOG_PATH=storage/logs/weather.log
```

## Best Practices

1. ✅ Never commit your real API key to version control
2. ✅ Use environment variables for all sensitive data
3. ✅ Enable caching to reduce API calls
4. ✅ Set appropriate timeouts (10-30 seconds)
5. ✅ Monitor API usage and rate limits
6. ✅ Implement error handling and fallbacks
7. ✅ Use HTTPS for all API communications
8. ✅ Keep API key rotation strategy

## Troubleshooting

### API Key Not Working
- Verify key is copied correctly (no spaces)
- Check API plan is active
- Ensure API endpoint is correct
- Check request parameters

### Timeout Errors
- Increase timeout value: `WEATHER_API_TIMEOUT=30`
- Check internet connection
- Verify API server status

### Cache Issues
- Clear cache: `php artisan cache:clear`
- Verify cache driver: `php artisan config:cache`
- Check Redis connection (if using Redis)

---

**Configuration Setup Complete!** Your weather app is ready for both development and production use.
