<?php

namespace Kesty\LaravelNotifier;
use \Illuminate\Support\Facades\Facade as InternalFacade;

class Facade extends InternalFacade {

    protected static function getFacadeAccessor()
    {
        return 'kestyNotify';
    }

}
