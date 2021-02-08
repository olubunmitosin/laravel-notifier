<?php

namespace Kesty\LaravelNotifier\Facade;
use \Illuminate\Support\Facades\Facade as InternalFacade;

/**
 * Class Notifier
 * @package Kesty\LaravelNotifier\Facade
 *
 * @method static array all()
 * @method static bool has($key)
 * @method static mixed get($key, $default = null)
 * @method static void prepend($key, $value)
 * @method static void push($key, $value)
 * @method static void set($key, $value = null)
 */
class Notifier extends InternalFacade {
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'kestyNotify';
    }

}
