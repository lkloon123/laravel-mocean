<?php
namespace NeoSon\Mocean;

interface MoceanInterface
{
    /**
     * @param string $to
     * @param string $message
     *
     * @return string
     */
    public function message($to, $message);
}
