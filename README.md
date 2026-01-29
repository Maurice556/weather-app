# 🌤️ Weather App

A weather forecast application built with Laravel and modern web technologies. Search for any city and get real-time weather information with a beautiful, responsive UI.

## 🚀 Features

- Search weather by city name
- Toggle between Celsius and Fahrenheit
- Display weather details (humidity, wind speed, pressure, etc.)
- Responsive mobile-friendly design
- Clean, animated UI

## 🛠️ Tech Stack

- **Backend:** Laravel 12
- **Frontend:** Blade, HTML, CSS, JavaScript
- **Build Tool:** Vite
- **Styling:** Custom CSS with responsive design

## 📋 Prerequisites

Before you start, make sure you have:
- PHP 8.2 or higher
- Node.js 18 or higher
- Composer

## 🔧 Installation & Setup

### 1. Clone the Repository
```bash
git clone https://github.com/Maurice556/weather-app.git
cd weather-app
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Build Assets
```bash
npm run build
```

### 5. Start the Server
```bash
php artisan serve --port=8001
```

Then open your browser and go to: **http://localhost:8001**

## 📁 Project Structure

```
weather-app/
├── app/Http/Controllers/
│   ├── WeatherController.php        # Main weather logic
│   └── Api/WeatherApiController.php # API routes
├── resources/
│   ├── views/weather.blade.php      # Main UI template
│   ├── css/weather.css              # Vite CSS
│   ├── js/weather.js                # Vite JavaScript
├── public/
│   └── weather-styles.css           # Main stylesheet
├── routes/
│   ├── web.php                      # Web routes
│   └── api.php                      # API routes
└── package.json                     # NPM packages
```

## 💻 How It Works

### Main Flow
1. User enters city name in the search box
2. Form submits to `/weather` route
3. `WeatherController` processes the city name
4. Weather data is fetched using the mock data generator
5. Results display on the same page

### API Endpoints
```bash
GET /api/weather?city=London&unit=metric
POST /api/weather/multiple
```

## 🎨 Styling

- **Desktop:** Flexbox layout for input and buttons
- **Mobile:** Grid layout that stacks elements responsively
- **Colors:** Purple gradient (#667eea to #764ba2)
- **Animations:** Smooth transitions and slide-in effects

All CSS is in `public/weather-styles.css`.

## 🐛 Troubleshooting

### "manifest.json not found"
```bash
npm run build
```

### Port 8001 already in use
```bash
php artisan serve --port=8002
```

### Dependencies issues
```bash
composer install
npm install
```

## 📚 Learn More

- [Laravel Documentation](https://laravel.com/docs)
- [Blade Templates](https://laravel.com/docs/blade)
- [Vite Documentation](https://vitejs.dev)

## 📄 License

MIT License - Feel free to use this project for your own purposes.

## 👨‍💻 Author

**Maurice556** - [GitHub](https://github.com/Maurice556)

---

**Star ⭐ this repo if it helps you!**

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
