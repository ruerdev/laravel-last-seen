# Add last seen functionality to your Laravel models

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ruerdev/laravel-last-seen.svg?style=flat-square)](https://packagist.org/packages/ruerdev/laravel-last-seen)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/ruerdev/laravel-last-seen/run-tests?label=tests)](https://github.com/ruerdev/laravel-last-seen/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/ruerdev/laravel-last-seen.svg?style=flat-square)](https://packagist.org/packages/ruerdev/laravel-last-seen)

This package is still under construction. Use with care and expect this package to change in future versions. This package does currently NOT work on other models besides the User model.

## Installation

You can install the package via composer:

```bash
composer require ruerdev/laravel-last-seen
```

You can publish the config file with:

```bash
php artisan vendor:publish --provider="Ruerdev\LaravelLastSeen\LaravelLastSeenServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [];
```

## Usage

Create a new migration and add a last_seen column to your database table of choice:

```php
Schema::table('users', function (Blueprint $table) {
    $table->timestamp('last_seen')->nullable();
});
```

Add the WithLastSeen trait to your Model:

```php
use WithLastSeen;
```

Use as route middelware:

```php
//app/Http/Kernel.php

protected $routeMiddleware = [
  ...
  'saveLastSeen' => \Ruerdev\LaravelLastSeen\Http\Middleware\SaveLastSeen::class,
];
```

Or as a global middleware:

```php
//app/Http/Kernel.php

protected $middleware = [
  ...
  \Ruerdev\LaravelLastSeen\Http\Middleware\SaveLastSeen::class,
];
```

If you are using Laravel Nova you can add a "Last Seen" field to your Resource:

```php
DateTime::make('Last Seen')
    ->readonly()
    ->sortable(),
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Rutger Broerze](https://github.com/ruerdev)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
