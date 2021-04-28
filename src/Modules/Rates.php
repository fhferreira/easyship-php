<?php

namespace Easyship\Modules;

use Easyship\Exceptions\UnsupportedApiVersionException;
use Easyship\Module;
use Psr\Http\Message\ResponseInterface;

class Rates extends Module
{
    /**
     * Request rates and taxes for a theoretical shipment.
     *
     * @link https://developers.easyship.com/reference#request-rates-and-taxes
     *
     * @param array $payload
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get(array $payload): ResponseInterface
    {
        if ($this->easyship->getApiVersion() == 1) {
            $endpoint = '/rate/v1/rates';
        } elseif ($this->easyship->getApiVersion() == 2) {
            $endpoint = '/v2/rates';
        } else {
            throw new UnsupportedApiVersionException();
        }

        return $this->easyship->request('post', $endpoint, $payload);
    }
}
