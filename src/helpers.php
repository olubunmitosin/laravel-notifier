<?php

if (!function_exists('kestyNotify')) {

    /**
     * @param null $message
     * @param null $title
     * @return \Illuminate\Contracts\Foundation\Application|mixed
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    function kestyNotify($message = null, $title = null)
    {
        $instance = app('kestyNotify');

        if (!isset($instance)) {
            $instance = app()->make('Kesty\LaravelNotifier\Notify');
        }

        if (!is_null($message)) {
            return $instance->message($message, null, $title);
        }

        return $instance;
    }

}
