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
     * @param string $title
     * @return $this
     */
    public function info($message, $title = null)
    {
        $this->message($message, $this->levels['info'], $title);

        return $this;
    }

    /**
     * Create a success message.
     *
     * @param string $message
     * @param string $title
     * @return $this
     */
    public function success($message, $title = null)
    {
        $this->message($message, $this->levels['success'], $title);

        return $this;
    }

    /**
     * Create an error message.
     *
     * @param string $message
     * @param string $title
     * @return $this
     */
    public function error($message, $title = null)
    {
        $this->message($message, $this->levels['error'], $title);

        return $this;
    }

    /**
     * Create a warning message.
     *
     * @param string $message
     * @param string $title
     * @return $this
     */
    public function warning($message, $title = null)
    {
        $this->message($message, $this->levels['warning'], $title);

        return $this;
    }

    /**
     * Create a message.
     *
     * @param string $message
     * @param string $level
     * @param string $title
     * @return $this
     */
    public function message($message, $level = null, $title = null)
    {
        if (!isset($level)) {
            $level = $this->levels['default'];
        }

        if (strlen($this->position) < 1) {
            $this->position = 'center';
        }

        array_push($this->notifiers, [
            'message' => $message,
            'level' => $level,
            'title' => $title,
            'position' => $this->positions[$this->position]
        ]);
        $this->flash();

        return $this;
    }

    /**
     * Clear all pending toasts from the session.
     *
     * @return $this
     */
    public function clear()
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
