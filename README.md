
# Laravel Notifier
Notification system for laravel ^7.* : ^8.* : ^9.* : ^10.0

Version 3.0 supports icon, image, layout and theme


## Installation

First, pull in the package through Composer.

```
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

### Setup

*Insert the following after the opening of <body> tag of your HTML*
For default bootstrap alert dev, use the following
```
@include('vendor.laravel-notifier.messages')
``` 

For Kesty Notify, use the following
```
@include('vendor.laravel-notifier.notify')
``` 

### Controller Usage
```
// call the facade class
KestyNotify::info(title, body);
```
```
// or as function
notifier('Welcome to Laravel', 'Laravel', 'success');
notifier()->message('Welcome to Laravel', 'Laravel', 'info');
```

Test the beautiful custom version like so

```
notifier()->message('Welcome to Laravel', 'Great', null, 'fa-solid fa-check', '/assets/images/avatar.jpg', 'dark', 2);
```
Ensure you have an avatar image and font-awesome icon is loaded.
You can use any icon of your choice, just check the icon argument to any icon you installed in your project.

You can modify /laravel-notifier/*.css to suit your needs. it's a basic iziToast styles.

