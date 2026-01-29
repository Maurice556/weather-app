# How to Build a New Laravel Project

This is a step-by-step guide to create a new Laravel project from scratch.

## Prerequisites

Before you start, make sure you have:
- **PHP 8.2 or higher** - Download from [php.net](https://www.php.net)
- **Composer** - Download from [getcomposer.org](https://getcomposer.org)
- **Node.js 18+** - Download from [nodejs.org](https://nodejs.org)
- **Git** (optional but recommended) - Download from [git-scm.com](https://git-scm.com)

Check if they're installed:
```bash
php -v
composer -v
node -v
npm -v
```

## Step 1: Create a New Laravel Project

Using Composer (recommended):
```bash
composer create-project laravel/laravel project-name
cd project-name
```

Or using Laravel Installer:
```bash
laravel new project-name
cd project-name
```

## Step 2: Install JavaScript Dependencies

```bash
npm install
```

This installs Vite and other JavaScript packages from `package.json`.

## Step 3: Setup Environment File

```bash
cp .env.example .env
```

This creates your `.env` file with default settings. You can edit it later if needed.

## Step 4: Generate Application Key

```bash
php artisan key:generate
```

This generates a unique encryption key for your app and adds it to `.env`.

## Step 5: Create Database (Optional)

If you need a database, Laravel uses SQLite by default. To use MySQL instead, edit `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=your_password
```

Then run migrations:
```bash
php artisan migrate
```

## Step 6: Build Frontend Assets

```bash
npm run build
```

This compiles your CSS and JavaScript for production.

## Step 7: Start the Development Server

Open **two terminals**:

**Terminal 1 - PHP Server:**
```bash
php artisan serve --port=8001
```

**Terminal 2 - Vite Dev Server (for CSS/JS changes):**
```bash
npm run dev
```

Then open: `http://localhost:8001`

## Project Structure

After creating a Laravel project, you'll have:

```
project-name/
├── app/
│   ├── Http/Controllers/     ← Your controllers go here
│   ├── Models/              ← Database models
│   └── Providers/           ← Service providers
├── resources/
│   ├── views/               ← Blade templates (.blade.php files)
│   ├── css/                 ← CSS files
│   └── js/                  ← JavaScript files
├── routes/
│   ├── web.php              ← Web routes
│   └── api.php              ← API routes
├── public/
│   └── index.php            ← Entry point
├── database/
│   ├── migrations/          ← Database migrations
│   └── seeders/             ← Seed data
├── .env                     ← Environment variables
├── composer.json            ← PHP dependencies
└── package.json             ← NPM dependencies
```

## Basic Workflow

1. **Create a route** in `routes/web.php`:
```php
Route::get('/hello', function () {
    return view('hello');
});
```

2. **Create a view** in `resources/views/hello.blade.php`:
```blade
<h1>Hello World</h1>
```

3. **Create a controller** (using artisan):
```bash
php artisan make:controller HelloController
```

4. **Create a model** (with migration):
```bash
php artisan make:model Post -m
```

5. **Run migrations**:
```bash
php artisan migrate
```

## Common Commands

```bash
# Create files
php artisan make:controller NameController
php artisan make:model ModelName
php artisan make:migration create_table_name
php artisan make:seeder SeederName

# Run migrations
php artisan migrate
php artisan migrate:rollback

# Tinker (interactive shell)
php artisan tinker

# Clear cache
php artisan cache:clear
php artisan config:cache
```

## Tips

- Always run **two terminals** during development: one for PHP, one for Vite
- Use `npm run dev` during development, `npm run build` before deploying
- Check `.env` file for configuration (database, app name, etc.)
- Use `php artisan tinker` to test code in real-time
- Read the [Laravel docs](https://laravel.com/docs) for detailed information

## Summary

```bash
# Full setup from scratch
composer create-project laravel/laravel project-name
cd project-name
npm install
cp .env.example .env
php artisan key:generate

# Start development (in 2 terminals)
php artisan serve --port=8001
npm run dev
```

That's it! You now have a working Laravel project ready for development.
