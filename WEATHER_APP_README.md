# 🌤️ Weather Application

A beautiful, modern weather application built with Laravel and featuring a stunning responsive UI.

## Features

- 🎨 **Modern, Responsive Design** - Beautiful gradient UI that works on all devices
- 🌍 **City Search** - Search weather for any city in the world
- 🌡️ **Temperature Units** - Toggle between Celsius and Fahrenheit
- 📊 **Detailed Weather Info** - View humidity, wind speed, pressure, visibility, and more
- ⚡ **Real-time Updates** - Instant weather data with smooth animations
- 🎯 **User-Friendly Interface** - Intuitive search and easy-to-read weather cards

## Weather Information Displayed

- **Current Temperature** - Shows the current temperature and "feels like" temperature
- **Weather Condition** - Clear sky, cloudy, rainy, snowy, etc. with appropriate emojis
- **Humidity** - Percentage of moisture in the air
- **Wind Speed** - Wind velocity in meters per second
- **Pressure** - Atmospheric pressure in hPa
- **Visibility** - How far you can see (in km)
- **Temperature Range** - Minimum and maximum temperatures
- **Cloud Coverage** - Percentage of sky covered by clouds
- **Wind Direction** - Direction from which the wind is blowing (in degrees)

## Installation

1. **Clone or navigate to the project directory:**
   ```bash
   cd c:\weather-app
   ```

2. **Install PHP dependencies:**
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies:**
   ```bash
   npm install
   ```

4. **Create a copy of the environment file:**
   ```bash
   copy .env.example .env
   ```

5. **Generate the application key:**
   ```bash
   php artisan key:generate
   ```

## Running the Application

### Option 1: Using Built-in PHP Server

Open two terminal windows:

**Terminal 1 - Start the Laravel development server:**
```bash
cd c:\weather-app
php artisan serve
```

The application will be available at `http://127.0.0.1:8000`

**Terminal 2 - Start the asset compilation server:**
```bash
cd c:\weather-app
npm run dev
```

### Option 2: Using Laravel Sail (Docker)

```bash
cd c:\weather-app
./vendor/bin/sail up -d
```

## Usage

1. **Open the application** in your web browser at `http://localhost:8000`
2. **Search for a city** by typing the city name in the search box and clicking "Search"
3. **Toggle temperature units** by selecting either Celsius or Fahrenheit
4. **View detailed weather information** in the beautiful card layout below the search area
5. **Try different cities** - Each search will give you up-to-date weather information

## Project Structure

```
weather-app/
├── app/
│   └── Http/
│       └── Controllers/
│           └── WeatherController.php    # Weather logic and data handling
├── resources/
│   ├── css/
│   │   └── weather.css                  # Weather app styling
│   ├── js/
│   │   └── weather.js                   # Weather app interactions
│   └── views/
│       └── weather.blade.php            # Weather app template
├── routes/
│   └── web.php                          # Application routes
├── vite.config.js                       # Vite configuration
├── composer.json                        # PHP dependencies
└── package.json                         # JavaScript dependencies
```

## Styling & Design

The application features:

- **Gradient Background** - Purple to violet gradient that creates a modern feel
- **Glass-morphism** - Semi-transparent cards with backdrop blur
- **Smooth Animations** - Fade-in effects, floating icons, and card hover animations
- **Responsive Grid** - Weather details automatically adjust for mobile devices
- **Color Scheme** - Purple (#667eea) and violet (#764ba2) gradient with light backgrounds

## API Integration

Currently, the application uses mock data for demonstration purposes. To integrate with a real weather API:

1. **Sign up for a free API key** at [OpenWeatherMap](https://openweathermap.org/api)
2. **Update the WeatherController.php:**
   ```php
   private $apiKey = 'your_actual_api_key_here';
   ```
3. **Uncomment the HTTP request code** in the `getWeatherData()` method
4. **Replace the mock data** with actual API responses

## Development

### Technologies Used
- **Framework:** Laravel 12.0
- **Frontend:** Blade Templates
- **Styling:** CSS3 with custom animations
- **Asset Bundling:** Vite
- **JavaScript:** Vanilla JS with modern features

### Building for Production

```bash
npm run build
```

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Performance Features

- **Lightweight CSS** - No heavy frameworks, optimized custom styling
- **Efficient JavaScript** - Minimal DOM manipulation
- **Smooth Animations** - GPU-accelerated CSS animations
- **Responsive Images** - Emoji-based weather icons (no image files)
- **Fast Load Times** - Optimized asset bundling with Vite

## Troubleshooting

### Application not starting?
1. Make sure PHP 8.2+ is installed
2. Verify all dependencies are installed: `composer install`
3. Check that port 8000 is not already in use

### Styles not loading?
1. Start the npm dev server: `npm run dev`
2. Clear browser cache (Ctrl+Shift+Delete)
3. Hard refresh the page (Ctrl+Shift+R)

### Database connection error?
1. This application doesn't require a database for basic functionality
2. Check your `.env` file if you plan to add database features

## Future Enhancements

- [ ] 5-day forecast
- [ ] Hourly weather updates
- [ ] Favorite cities list
- [ ] Weather alerts and notifications
- [ ] Weather history charts
- [ ] Dark mode toggle
- [ ] Weather icons using external weather icon library
- [ ] Local storage for recent searches
- [ ] Multi-language support

## License

This project is open-source and available under the MIT License.

## Support

For issues or questions, please create an issue in the project repository or contact the development team.

---

**Enjoy checking the weather! 🌤️**
