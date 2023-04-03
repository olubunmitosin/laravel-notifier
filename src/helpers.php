<?php

if (!function_exists('notifier')) {

    function notifier($message = null, $title = null, $type = null, $icon = null, $image = null, $theme = null, $layout = null)
    {
        $instance = app('kestyNotify');

        if (!isset($instance)) {
            $instance = app()->make('Kesty\LaravelNotifier\Notify');
        }

        if (!is_null($message)) {
            return $instance->message($message, $title, $type, $icon, $image, $theme, $layout);
        }

        return $instance;
    }

}
