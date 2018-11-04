<?php
namespace NeoSon\Mocean;

use InvalidArgumentException;

class Manager implements MoceanInterface
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
     * @param array $settings
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

        return new Mocean($settings['MOCEAN_API_KEY'], $settings['MOCEAN_API_SECRET'], $settings['MOCEAN_FROM']);
    }

    /**
     * @param string $to
     * @param string $message
     *
     * @return string
     */
    public function message($to, $message)
    {
        return call_user_func_array([$this->defaultConnection(), 'message'], func_get_args());
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
     * @param array $arguments
     *
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        return call_user_func_array([$this->defaultConnection(), $method], $arguments);
    }
}
