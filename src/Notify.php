<?php

namespace Kesty\LaravelNotifier;


class Notify {

    /**
     * The current toasts.
     *
     * @var array
     */
    protected $notifiers = [];

    /**
     * The CSS classes to use.
     * Configured by the developer (see config/config.php for default).
     *
     * @var string
     */
    protected $levels = [];

    /**
     * The current position
     * @var string
     */
    protected $position = '';


    /**
     * Available Positions
     *
     * @var array
     */
    protected $positions = [];


    /**
     * Construction method.
     *
     * @return void
     */
    function __construct()
    {
        $this->levels = config('laravel-notifier.levels');
        $this->positions = config('laravel-notifier.positions');
        $this->position = config('laravel-notifier.current-position');
    }

    /**
     * Call method to enable custom levels specified in config.
     *
     * @param $method
     * @param $args
     * @return void
     */
    function __call($method, $args)
    {
        if (array_key_exists($method, $this->levels)) {
            call_user_func_array([$this, 'message'], $args);
        } else {
            throw new \BadMethodCallException('Notifier config file does not contain level "' . $method . '"');
        }
    }


    /**
     * Create an info message.
     *
     * @param string $message
     * @param null $title
     * @return $this
     */
    public function info(string $message, $title = null): Notify
    {
        $this->message($message, $this->levels['info'], $title);

        return $this;
    }

    /**
     * Create a success message.
     *
     * @param string $message
     * @param null $title
     * @return $this
     */
    public function success(string $message, $title = null): Notify
    {
        $this->message($message, $this->levels['success'], $title);

        return $this;
    }

    /**
     * Create an error message.
     *
     * @param string $message
     * @param null $title
     * @return $this
     */
    public function error(string $message, $title = null): Notify
    {
        $this->message($message, $this->levels['error'], $title);

        return $this;
    }

    /**
     * Create a warning message.
     *
     * @param string $message
     * @param null $title
     * @return $this
     */
    public function warning(string $message, $title = null): Notify
    {
        $this->message($message, $this->levels['warning'], $title);

        return $this;
    }

    /**
     * Create a message.
     *
     * @param string $message
     * @param null $level
     * @param null $title
     * @param null $icon
     * @param null $image
     * @param null $theme
     * @param null $layout
     * @return $this
     */
    public function message(string $message, $title = null, $level = null, $icon = null, $image = null, $theme = null, $layout = null): Notify
    {
        if (!isset($level)) {
            $level = $this->levels['default'];
        }

        if (strlen($this->position) < 1) {
            $this->position = 'center';
        }

        $this->notifiers[] = [
            'message' => $message,
            'level' => $level,
            'title' => $title,
            'position' => $this->positions[$this->position],
            'icon' => $icon ?? 'icon-check',
            'image' => $image ?? '',
            'theme' => $theme ?? 'light',
            'layout' => $layout ?? 1
        ];

        $this->flash();
        return $this;
    }

    /**
     * Clear all pending toasts from the session.
     *
     * @return $this
     */
    public function clear(): Notify
    {
        $this->notifiers = [];
        $this->flash();

        return $this;
    }


    /**
     * Internal function to flash the session with the pending toasts.
     *
     * @return void
     */
    private function flash()
    {
        session()->flash('notifiers', $this->notifiers);
    }

}
