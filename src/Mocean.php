<?php

namespace NeoSon\Mocean;

use Mocean\Client;
use Mocean\Client\Credentials\Basic;

class Mocean implements MoceanInterface
{
    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var string
     */
    protected $apiSecret;

    /**
     * @var string
     */
    protected $from;

    /**
     * @var \Mocean\Client
     */
    protected $mocean;

    /**
     * @param string $apiKey
     * @param string $apiSecret
     * @param string $from
     */
    public function __construct($apiKey, $apiSecret, $from)
    {
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
        $this->from = $from;
    }

    /**
     * @param string $to
     * @param string $text
     * @param array  $params
     *
     * @link http://moceanapi.com/docs/#send-sms Documentation
     *
     * @throws Client\Exception\Exception
     *
     * @return string
     */
    public function message($to, $text, array $params = [])
    {
        $params['mocean-to'] = $to;
        $params['mocean-text'] = $text;
        $params['mocean-resp-format'] = 'json';

        if (!isset($params['mocean-from'])) {
            $params['mocean-from'] = $this->from;
        }

        return $this->getMocean()->message()->send($params);
    }

    /**
     * Get the configured mocean sdk object.
     *
     * @return \Mocean\Client
     */
    public function getMocean()
    {
        if ($this->mocean) {
            return $this->mocean;
        }

        return $this->mocean = new Client(new Basic($this->apiKey, $this->apiSecret));
    }
}
