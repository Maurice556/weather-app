# Getting Started

## What This App Does

This is a weather app that lets you:
- Search for any city's weather
- See current temperature, humidity, wind speed, and more
- Switch between Celsius and Fahrenheit
- View everything on desktop, tablet, or phone

That's it! Simple weather information with a nice-looking interface.

## How to Run It

### Step 1: Install Dependencies
```bash
composer install
npm install
```

### Step 2: Setup
```bash
cp .env.example .env
php artisan key:generate
npm run build
```

### Step 3: Start
```bash
php artisan serve --port=8001
```

Open your browser: `http://localhost:8001`

## That's All!

Search for a city like "London" or "Tokyo" and see the weather. Use the buttons to switch between Celsius and Fahrenheit.

For API endpoints, check the code in `app/Http/Controllers/Api/WeatherApiController.php`.
