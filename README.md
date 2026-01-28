# 🌤️ Weather App

A beautiful, responsive weather forecast application built with **Laravel 12** and **Vite**. Get real-time weather information with an elegant, modern UI.

## 📸 Screenshots

> Add screenshots here to show off your beautiful UI!

**To add screenshots:**
1. Take a screenshot of your weather app running at `http://localhost:8001`
2. Save it as `screenshot-desktop.png` and `screenshot-mobile.png`
3. Create a `screenshots/` folder in your project
4. Upload them to your GitHub repo
5. Then use these lines to display them:

```markdown
### Desktop View
![Weather App Desktop](screenshots/screenshot-desktop.png)

### Mobile View
![Weather App Mobile](screenshots/screenshot-mobile.png)
```

## ✨ Features

- 🔍 **Search Cities** - Find weather for any city worldwide
- 🌡️ **Temperature Units** - Toggle between Celsius and Fahrenheit
- 📊 **Detailed Metrics** - View humidity, wind speed, pressure, visibility, and more
- 📱 **Responsive Design** - Beautiful on desktop, tablet, and mobile
- 🎨 **Modern UI** - Gradient design with smooth animations
- ⚡ **Fast & Lightweight** - Built with vanilla JavaScript, no heavy frameworks
- 🔌 **REST API** - Weather API endpoints for integration

## 🛠️ Tech Stack

- **Backend:** Laravel 12
- **Frontend:** Blade Templates, Vanilla JavaScript
- **Build Tool:** Vite with laravel-vite-plugin
- **Styling:** Custom CSS3 with animations
- **Package Manager:** Composer, NPM

## 🚀 Quick Start

### Requirements
- PHP 8.2+
- Node.js 18+
- Composer
- NPM

### Installation

```bash
# Clone the repository
git clone https://github.com/Maurice556/weather-app.git
cd weather-app

# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Build assets
npm run build

# Start the development server
php artisan serve --port=8001
```

Then visit: **http://localhost:8001**

## 📖 Documentation

- [Setup Guide](./SETUP_GUIDE.md) - Detailed installation instructions
- [Design Guide](./DESIGN_GUIDE.md) - UI/UX design documentation
- [Implementation Summary](./IMPLEMENTATION_SUMMARY.md) - Project structure overview

## 🎯 Project Structure

```
weather-app/
├── app/
│   ├── Http/Controllers/
│   │   ├── WeatherController.php       # Main weather logic
│   │   └── Api/WeatherApiController.php # REST API endpoints
│   └── Models/
├── resources/
│   ├── views/
│   │   └── weather.blade.php           # Main UI template
│   ├── css/
│   │   └── weather.css                 # Custom styling
│   └── js/
│       └── weather.js                  # Frontend interactivity
├── routes/
│   ├── web.php                         # Web routes
│   └── api.php                         # API routes
└── package.json                        # NPM dependencies
```

## 🌐 API Endpoints

### Get Weather for a City
```bash
GET /api/weather?city=London&unit=metric
```

### Get Weather for Multiple Cities
```bash
POST /api/weather/multiple
{
  "cities": ["London", "New York", "Tokyo"],
  "unit": "metric"
}
```

## 🎨 Design Highlights

- **Gradient Background:** Beautiful purple-to-violet gradient
- **Glassmorphism Cards:** Modern semi-transparent weather detail cards
- **Smooth Animations:** Slide-in animations and hover effects
- **Mobile-First:** Responsive layout that works on all devices
- **Accessible:** Proper form labels and semantic HTML

## 💡 Future Enhancements

- [ ] 5-day forecast
- [ ] Weather alerts
- [ ] Saved favorite cities
- [ ] Dark mode toggle
- [ ] Real OpenWeatherMap API integration
- [ ] Weather history charts

## 📝 License

This project is open source and available under the MIT License.

## 👨‍💻 Author

**Maurice556** - [GitHub Profile](https://github.com/Maurice556)

---

**⭐ If you find this helpful, please star it on GitHub!**

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
