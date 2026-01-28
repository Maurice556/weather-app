<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Weather App - Current Weather Forecast</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/weather.css', 'resources/js/weather.js'])
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            font-family: 'Instrument Sans', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        body {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 20px;
            margin: 0;
            overflow-y: auto;
        }

        .weather-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 30px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 40px;
            max-width: 600px;
            width: 100%;
            animation: slideIn 0.5s ease-out;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .weather-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .weather-header h1 {
            color: #333;
            font-size: 2.5rem;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .weather-header p {
            color: #666;
            font-size: 1rem;
        }

        .search-box {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            align-items: center;
            flex-wrap: nowrap;
        }

        .search-box input {
            flex: 1;
            min-width: 150px;
            padding: 12px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 1rem;
            font-family: 'Instrument Sans', sans-serif;
            transition: border-color 0.3s;
        }

        .search-box input:focus {
            outline: none;
            border-color: #667eea;
        }

        .search-box button {
            padding: 12px 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            transition: transform 0.2s;
            font-family: 'Instrument Sans', sans-serif;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .search-box button:hover {
            transform: translateY(-2px);
        }

        .unit-selector {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .unit-selector label {
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            padding: 10px 15px;
            border-radius: 8px;
            border: 2px solid #e0e0e0;
            transition: all 0.3s;
            font-weight: 500;
            background-color: #fff;
        }

        .unit-selector label:hover {
            border-color: #667eea;
            background-color: #f9f9f9;
        }

        .unit-selector input[type="radio"] {
            display: none;
        }

        .unit-selector input[type="radio"]:checked + span {
            color: #667eea;
            font-weight: 700;
        }

        .unit-selector input[type="radio"]:checked ~ * {
            color: #667eea;
        }

        .unit-selector label:has(input[type="radio"]:checked) {
            border-color: #667eea;
            background: linear-gradient(135deg, #667eea10 0%, #764ba210 100%);
        }

        .unit-selector span {
            text-align: center;
            width: 100%;
        }

        .error-message {
            background: #fee;
            border: 2px solid #fcc;
            color: #c33;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 500;
        }

        .weather-main {
            text-align: center;
            margin-bottom: 30px;
            padding: 20px;
            background: linear-gradient(135deg, #667eea15 0%, #764ba215 100%);
            border-radius: 20px;
        }

        .weather-icon {
            font-size: 4rem;
            margin-bottom: 15px;
        }

        .temperature {
            font-size: 3.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
        }

        .weather-description {
            font-size: 1.2rem;
            color: #666;
            text-transform: capitalize;
            margin-bottom: 10px;
        }

        .feels-like {
            color: #999;
            font-size: 0.95rem;
        }

        .weather-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .detail-card {
            background: linear-gradient(135deg, #f5f7ff 0%, #f0edff 100%);
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            border: 1px solid #e0d9ff;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .detail-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.2);
        }

        .detail-label {
            color: #999;
            font-size: 0.85rem;
            margin-bottom: 8px;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .detail-value {
            color: #333;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .no-weather {
            text-align: center;
            color: #999;
            padding: 40px 20px;
        }

        .no-weather p {
            font-size: 1.1rem;
            margin-bottom: 20px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #999;
            font-size: 0.85rem;
        }

        @media (max-width: 768px) {
            .weather-container {
                padding: 20px;
                margin-top: 10px;
                margin-bottom: 10px;
            }

            .weather-header {
                margin-bottom: 20px;
            }

            .weather-header h1 {
                font-size: 1.8rem;
                margin-bottom: 8px;
            }

            .weather-header p {
                font-size: 0.9rem;
            }

            .search-box {
                flex-wrap: wrap;
                align-items: stretch;
                gap: 8px;
                margin-bottom: 15px;
            }

            .search-box input {
                flex-basis: 100%;
                min-width: 100%;
                padding: 10px 15px;
                font-size: 1rem;
            }

            .search-box button {
                flex-basis: 100%;
                width: 100%;
                padding: 10px;
                font-size: 1rem;
            }

            .unit-selector {
                flex-basis: 100%;
                margin-bottom: 20px;
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            .unit-selector label {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 12px 10px;
                font-size: 0.95rem;
                border-radius: 8px;
                border: 2px solid #e0e0e0;
                transition: all 0.3s;
                background-color: #fff;
            }

            .unit-selector label:hover {
                border-color: #667eea;
                background-color: #f9f9f9;
            }

            .unit-selector input[type="radio"] {
                display: none;
            }

            .unit-selector span {
                font-weight: 500;
                text-align: center;
                width: 100%;
            }

            .unit-selector label:has(input[type="radio"]:checked) {
                border-color: #667eea;
                background: linear-gradient(135deg, #667eea10 0%, #764ba210 100%);
                color: #667eea;
                font-weight: 600;
            }

            .weather-main {
                margin-bottom: 20px;
                padding: 15px;
            }

            .weather-icon {
                font-size: 3rem;
                margin-bottom: 10px;
            }

            .temperature {
                font-size: 2.2rem;
                margin-bottom: 8px;
            }

            .weather-description {
                font-size: 1rem;
                margin-bottom: 8px;
            }

            .feels-like {
                font-size: 0.85rem;
            }

            .weather-details {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
                margin-bottom: 20px;
            }

            .detail-card {
                padding: 15px;
                border-radius: 12px;
            }

            .detail-label {
                font-size: 0.75rem;
                margin-bottom: 6px;
            }

            .detail-value {
                font-size: 1.2rem;
            }

            .no-weather {
                padding: 30px 15px;
            }

            .no-weather p {
                font-size: 1rem;
                margin-bottom: 15px;
            }

            .footer {
                margin-top: 20px;
                font-size: 0.75rem;
            }
        }
    </style>
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
