
# Laravel Notifier
Notification system for laravel ^7.* : ^8.* : ^9.* : ^10.0

Version 3.0 supports icon, image, layout and theme
## Installation

First, pull in the package through Composer.

```js
composer require kesty/laravel-notifier
```

And then include the service provider within `app/config/app.php`. (Skip this step if you are on Laravel 7.5 or above)

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
```
// call the facade class

KestyNotify::info(title, body);

// or as function
kestyNotify('Welcome to Laravel', 'Laravel', 'success');
kestyNotify()->message('Welcome to Laravel', null, 'Laravel');
```

3. Include  @include('vendor.laravel-notifier.messages') or  @include('vendor.laravel-notifier.notify') somewhere in your template.

You can modify /laravel-notifier/*.css to suit your needs. it's a basic iziToast styles.

