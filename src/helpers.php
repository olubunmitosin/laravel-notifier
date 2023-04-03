<?php

if (!function_exists('kestyNotify')) {

    function kestyNotify($message = null, $title = null, $type = null, $icon = null, $image = null, $theme = null, $layout = null)
    {
        $instance = app('kestyNotify');

        if (!isset($instance)) {
            $instance = app()->make('Kesty\LaravelNotifier\Notify');
        }

        if (!is_null($message)) {
            return $instance->message($message, $type, $title, $icon, $image, $theme, $layout);
        }

        return $instance;
    }

}
