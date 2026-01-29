<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Weather App - Current Weather Forecast</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('weather-styles.css') }}">
    @vite(['resources/css/weather.css', 'resources/js/weather.js'])
</head>
<body>
    <div class="weather-container">
        <div class="weather-header">
            <h1>🌤️ Weather App</h1>
            <p>Check the weather in your favorite cities</p>
        </div>

        <form method="GET" action="{{ route('weather.index') }}" class="search-box" id="weatherForm">
            <input 
                type="text" 
                name="city" 
                placeholder="Enter city name..." 
                value="{{ $city }}"
                required
            >
            <button type="submit">Search</button>

            <div class="unit-selector">
                <label>
                    <input 
                        type="radio" 
                        name="unit" 
                        value="metric" 
                        {{ $unit === 'metric' ? 'checked' : '' }}
                        onchange="document.getElementById('weatherForm').submit()"
                    >
                    <span>Celsius</span>
                </label>
                <label>
                    <input 
                        type="radio" 
                        name="unit" 
                        value="imperial" 
                        {{ $unit === 'imperial' ? 'checked' : '' }}
                        onchange="document.getElementById('weatherForm').submit()"
                    >
                    <span>Fahrenheit</span>
                </label>
            </div>
        </form>

        @if ($error)
            <div class="error-message">
                {{ $error }}
            </div>
        @endif

        @if ($weather)
            <div class="weather-main">
                <div class="weather-icon">
                    {{ $weatherEmoji }}
                </div>
                <div class="temperature">
                    {{ round($weather['main']['temp']) }}{{ $temperatureUnit }}
                </div>
                <div class="weather-description">
                    {{ $weather['weather'][0]['description'] }}
                </div>
                <div class="feels-like">
                    Feels like {{ round($weather['main']['feels_like']) }}{{ $temperatureUnit }}
                </div>
            </div>

            <div class="weather-details">
                <div class="detail-card">
                    <div class="detail-label">Humidity</div>
                    <div class="detail-value">{{ $weather['main']['humidity'] }}%</div>
                </div>

                <div class="detail-card">
                    <div class="detail-label">Wind Speed</div>
                    <div class="detail-value">{{ round($weather['wind']['speed'], 1) }} m/s</div>
                </div>

                <div class="detail-card">
                    <div class="detail-label">Pressure</div>
                    <div class="detail-value">{{ $weather['main']['pressure'] }} hPa</div>
                </div>

                <div class="detail-card">
                    <div class="detail-label">Visibility</div>
                    <div class="detail-value">{{ round($weather['visibility'] / 1000, 1) }} km</div>
                </div>

                <div class="detail-card">
                    <div class="detail-label">Min Temp</div>
                    <div class="detail-value">{{ round($weather['main']['temp_min']) }}{{ $temperatureUnit }}</div>
                </div>

                <div class="detail-card">
                    <div class="detail-label">Max Temp</div>
                    <div class="detail-value">{{ round($weather['main']['temp_max']) }}{{ $temperatureUnit }}</div>
                </div>

                <div class="detail-card">
                    <div class="detail-label">Cloud Coverage</div>
                    <div class="detail-value">{{ $weather['clouds']['all'] }}%</div>
                </div>

                <div class="detail-card">
                    <div class="detail-label">Wind Direction</div>
                    <div class="detail-value">{{ round($weather['wind']['deg']) }}°</div>
                </div>
            </div>

            <div class="footer">
                <p>📍 {{ $weather['name'] }}, {{ $weather['country'] }}</p>
                <p>Last updated: {{ now()->format('H:i') }}</p>
            </div>
        @else
            <div class="no-weather">
                <p>👆 Enter a city name to see the weather</p>
                <p style="font-size: 0.9rem; color: #ccc;">Try: London, New York, Tokyo, Paris, Sydney...</p>
            </div>
        @endif
    </div>
</body>
</html>
