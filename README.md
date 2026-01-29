# Weather App

Just a simple weather app. Type in a city and it shows you the weather.

## What You Get

- Search for weather by city
- Switch between Celsius and Fahrenheit  
- Shows humidity, wind speed, pressure, and stuff like that
- Works on your phone too
- Nice purple design with some animations

## What You Need

- PHP 8.2+
- Node.js 18+
- Composer

## How to Get It Running

```bash
# Download it
git clone https://github.com/Maurice556/weather-app.git
cd weather-app

# Install everything
composer install
npm install

# Setup
cp .env.example .env
php artisan key:generate
npm run build

# Run it
php artisan serve --port=8001
```

Then go to: `http://localhost:8001`

## Important Files

**app/Http/Controllers/WeatherController.php**
- This is where the weather search happens. When you search for a city, this file handles it.

**resources/views/weather.blade.php**
- This is the page you see. It has the search box, buttons, and shows the weather results.

**public/weather-styles.css**
- All the styling - colors, layout, responsive design for mobile. This is what makes it look nice.

**resources/js/weather.js**
- Small JavaScript file that handles form stuff and animations.

**routes/web.php**
- Tells Laravel that when you go to `/weather`, use the WeatherController.

## How It Actually Works

1. You type a city name and click Search
2. Laravel sends it to `WeatherController`
3. The controller gets the weather data
4. It shows you the results on the same page

When you switch between °C and °F, it just reloads the page with the new temperature unit.

## If Something Goes Wrong

**Build error?**
```bash
npm run build
```

**Port 8001 already in use?**
```bash
php artisan serve --port=8002
```

**Missing packages?**
```bash
composer install
npm install
```

---

MIT License. Made with Laravel.
