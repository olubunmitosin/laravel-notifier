
# Laravel Notifier
Reviewer system for laravel 7.*

## Installation

First, pull in the package through Composer.

```js
composer require kesty/laravel-notifier
```

And then include the service provider within `app/config/app.php`. (Skip this step if you are on Laravel 5.5 or above)

```php
'providers' => [
    Kesty\LaravelNotifier\NotifierServiceProvider::class
];
```

At last you need to publish configs and assets.
```
php artisan vendor:publish --provider="Kesty\LaravelNotifier\ServiceProvider"
```

-----

### Controller Usage
````
// call the facade class
use Kesty\LaravelNotifier\KestyNotify;

KestyNotify::message(title, body);

// or as function
KestyNotify()->message(title, body);
````
