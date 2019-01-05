<?php

namespace NeoSon\Mocean;

interface MoceanInterface
{
    /**
     * @param $from
     * @param string $to
     * @param string $text
     * @param array  $params
     *
     * @return string
     *
     * @link http://moceanapi.com/docs/#send-sms Documentation
     */
    public function message($from, $to, $text, array $params);

    /**
     * Get the configured mocean sdk object.
     *
     * @return \Mocean\Client
     */
    public function getMocean();
}
