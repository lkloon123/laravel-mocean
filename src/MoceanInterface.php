<?php

namespace NeoSon\Mocean;

interface MoceanInterface
{
    /**
     * @param string $to
     * @param string $text
     * @param array  $params
     *
     * @link http://moceanapi.com/docs/#send-sms Documentation
     *
     * @throws \Mocean\Client\Exception\Exception
     *
     * @return string
     */
    public function message($to, $message);

    /**
     * Get the configured mocean sdk object.
     *
     * @return \Mocean\Client
     */
    public function getMocean();
}
