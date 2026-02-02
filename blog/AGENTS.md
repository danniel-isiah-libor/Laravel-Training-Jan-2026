# Project Guidelines

## Code Style

- **PHP**: Laravel Pint with Laravel preset ([pint.json](pint.json))
- **Formatting**: Run `composer lint` to auto-fix, `composer test:lint` to check
- **Standards**: PSR-12 via Laravel Pint preset
- **Reference**: See [app/Models/Post.php](app/Models/Post.php), [app/Http/Controllers/PostController.php](app/Http/Controllers/PostController.php)

## Architecture

**Stack**: Laravel 12 + Livewire 4 + Flux UI + Fortify Auth

- **Frontend**: Livewire full-stack components with Flux UI library, Vite + Tailwind CSS v4
- **Auth**: Laravel Fortify handles authentication flows (login, register, password reset, 2FA)
- **Controllers**: Traditional resource controllers for CRUD operations ([PostController.php](app/Http/Controllers/PostController.php))
- **Livewire Actions**: Encapsulated logic in `app/Livewire/Actions/` (see [Logout.php](app/Livewire/Actions/Logout.php))
- **Views**: Blade templates with Flux components in `resources/views/`, layouts inherit from `x-layouts::app.sidebar`
- **Models**: Eloquent models with factories in `database/factories/` ([Post.php](app/Models/Post.php))

## Build and Test

```bash
# Initial setup
composer setup              # Install dependencies, generate key, migrate, build assets

# Development (runs 4 concurrent processes: server, queue, logs, vite)
composer dev                # Starts Laravel server, queue worker, Pail logs, and Vite

# Alternative: separate processes
php artisan serve           # Start Laravel server
npm run dev                 # Start Vite dev server
php artisan queue:listen    # Process queue jobs
php artisan pail            # Watch logs

# Testing
composer test               # Run Pint linter + Pest tests
composer test:lint          # Check code style only
php artisan test            # Run Pest tests only

# Linting
composer lint               # Auto-fix code style issues with Pint
```

## Project Conventions

### Form Requests with Auth Injection

Form requests use `prepareForValidation()` to inject authenticated user data:

```php
protected function prepareForValidation(): void {
    $this->merge(['user_id' => auth()->user()->id]);
}
```

See [StorePostRequest.php](app/Http/Requests/StorePostRequest.php) for example.

### Testing with Pest

- All feature tests use `RefreshDatabase` trait (configured in [tests/Pest.php](tests/Pest.php))
- Use `actingAs($user)` for authenticated requests
- Example: [tests/Feature/DashboardTest.php](tests/Feature/DashboardTest.php)

### Livewire Actions Pattern

Encapsulate complex logic in invokable action classes under `app/Livewire/Actions/` (e.g., [Logout.php](app/Livewire/Actions/Logout.php))

### Route Organization

- Public routes in [routes/web.php](routes/web.php)
- Settings/profile routes in [routes/settings.php](routes/settings.php)
- Use named routes with `->name()` for easy reference

## Integration Points

- **Livewire**: Full-page components and interactive widgets
- **Flux**: UI component library for Blade views
- **Fortify**: Authentication backend (login, registration, 2FA, password reset)
- **Vite**: Asset bundling with Tailwind CSS v4
- **Pest**: Testing framework with Laravel plugin

## Security

- **Auth Middleware**: Protected routes use `['auth', 'verified']` middleware (see [routes/web.php](routes/web.php))
- **Form Validation**: Use Form Request classes with validation rules in `app/Http/Requests/`
- **CSRF**: Automatic CSRF protection on POST/PUT/PATCH/DELETE routes
- **Session Management**: Fortify handles session invalidation on logout
- **2FA Support**: Two-factor authentication columns in users table via Fortify
