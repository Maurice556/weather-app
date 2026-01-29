# Technologies Used

This is a breakdown of everything used to build the Weather App.

## Backend

### Laravel 12
The main framework. It's a PHP framework that handles routing, controllers, and the application structure. When you search for a city, Laravel routes it to the right controller.

**Why:** Laravel makes it easy to build web apps quickly with built-in features for routing, controllers, and views.

### PHP 8.2+
The programming language. Laravel is written in PHP, so the entire backend runs on PHP.

**Why:** PHP is great for web development and Laravel is built on it.

### Blade
Laravel's template engine. It's used in `resources/views/weather.blade.php`. Blade lets you write HTML mixed with PHP logic (like `{{ $city }}` or `@if`).

**Why:** Makes it easy to write views without writing messy PHP code directly in HTML.

## Frontend

### HTML5
The structure of the page. The weather box, search input, buttons, and results are all HTML.

**Why:** HTML is the foundation of any web page.

### CSS3
All the styling and animations. The purple gradient, button hover effects, responsive layout - it's all in `public/weather-styles.css`.

**Why:** CSS makes things look nice and responsive.

### JavaScript (Vanilla)
Small interactive features in `resources/js/weather.js`. Handles form submissions and animations.

**Why:** Makes the page interactive without needing heavy libraries like React or Vue.

## Build Tools

### Vite
Bundles and optimizes your CSS and JavaScript. It's configured in `vite.config.js`.

**How it works:**
1. You have your CSS and JS files in `resources/`
2. When you run `npm run build`, Vite compresses and optimizes them
3. They go into `public/build/` for production

**Why:** Makes your app faster by optimizing assets and handling imports.

### Composer
Manages PHP packages (dependencies). It reads `composer.json` and installs what you need.

**What it installed:**
- Laravel 12 framework
- Database drivers
- Testing tools
- Other utilities

**Why:** Similar to NPM but for PHP.

### NPM (Node Package Manager)
Manages JavaScript packages. It reads `package.json` and installs what you need.

**What it installed:**
- Vite (build tool)
- Tailwind CSS (optional utilities)
- Build scripts

**Why:** JavaScript packages come from NPM.

## Version Control

### Git
Tracks changes to your code. Every time you commit, Git saves a snapshot.

**Why:** You can go back to old versions, collaborate with others, and track what changed.

### GitHub
Where your code lives online. Remote storage for your Git repository.

**Why:** Backup, sharing, and portfolio.

## File Organization

Here's how these technologies work together:

```
resources/js/weather.js → npm → Vite → public/build/weather-*.js
resources/css/weather.css → npm → Vite → public/build/weather-*.css
public/weather-styles.css → (loaded directly)
resources/views/weather.blade.php → (rendered by Laravel)
app/Http/Controllers/WeatherController.php → (handles logic)
routes/web.php → (defines URL routes)
```

## The Flow

1. You visit `http://localhost:8001`
2. Laravel sees the URL and routes it to `WeatherController`
3. Controller loads `weather.blade.php` which is mixed with HTML and PHP
4. The page shows with CSS from `public/weather-styles.css` and JS from `resources/js/weather.js`
5. When you search, the form submits to the same URL
6. Controller processes it and shows results

## Summary

- **Backend:** Laravel (PHP)
- **Frontend:** HTML, CSS, JavaScript
- **Building:** Vite, Composer, NPM
- **Templating:** Blade
- **Version Control:** Git + GitHub

Each technology has a specific job. Laravel handles the logic, Blade mixes HTML with data, CSS makes it look good, JavaScript adds interactivity, and Vite bundles everything for production.
