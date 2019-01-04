<?php

namespace NeoSon\Mocean;

use InvalidArgumentException;

class Manager
{
    /**
     * @var string
     */
    protected $default;

    /**
     * @var array
     */
    protected $settings;

    /**
     * @param string $default
     * @param array  $settings
     */
    public function __construct($default, array $settings)
    {
        $this->default = $default;
        $this->settings = $settings;
    }

    /**
     * @param string $account
     *
     * @return \NeoSon\Mocean\MoceanInterface
     */
    public function using($account)
    {
        if (!isset($this->settings[$account])) {
            throw new InvalidArgumentException("Account \"$account\" is not configured.");
        }

        $settings = $this->settings[$account];

        if (!isset($settings['MOCEAN_API_KEY']) || $settings['MOCEAN_API_KEY'] === '') {
            throw new InvalidArgumentException('MOCEAN_API_KEY is not configured');
        }

        if (!isset($settings['MOCEAN_API_SECRET']) || $settings['MOCEAN_API_SECRET'] === '') {
            throw new InvalidArgumentException('MOCEAN_API_SECRET is not configured');
        }

        if (!isset($settings['MOCEAN_FROM']) || $settings['MOCEAN_FROM'] === '') {
            throw new InvalidArgumentException('MOCEAN_FROM is not configured');
        }

        return new Mocean($settings['MOCEAN_API_KEY'], $settings['MOCEAN_API_SECRET'], $settings['MOCEAN_FROM']);
    }

    /**
     * @return \NeoSon\Mocean\MoceanInterface
     */
    public function defaultConnection()
    {
        return $this->using($this->default);
    }

    /**
     * @param string $method
     * @param array  $arguments
     *
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        return call_user_func_array([$this->defaultConnection(), $method], $arguments);
    }
}
