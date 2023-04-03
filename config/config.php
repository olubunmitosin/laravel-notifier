<?php

return array(

    /**
     * Specify the class used for each level.
     *
     * You can create a custom method here by passing a new level name and class.
     * For example: 'help' => 'help' will allow you to call KestyNotify::help($message).
     * Alternatively, you can use the KestyNotify::message($message, $level) method instead.
     */
    'levels' => array(
        'info' => 'info',
        'success' => 'success',
        'error' => 'error',
        'warning' => 'warning',
        'default' => ''
    ),

    /**
     * Below are available positions
     *
     * You can specify an actual position via current-position by entering the position key
     * e.g bottom-right.
     * By default, position is "bottom-center"
     */
    'positions' => array(
        'bottom-right' => 'bottomRight',
        'bottom-left' => 'bottomLeft',
        'top-right' => 'topRight',
        'top-left' => 'topLeft',
        'center' => 'center',
        'top-center' => 'topCenter',
        'bottom-center' => 'bottomCenter'
    ),

    /**
     * Current Position
     */
    'current-position' => 'top-right',

    /**
     * Default Progress Bar Color
     */
    'progress-bar-color' => 'rgb(0, 255, 184)',

    /**
     * Default Icon Color
     */
    'icon-color' => 'rgb(0, 255, 184)',
);
