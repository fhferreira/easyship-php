<?php

namespace Easyship\Modules;

use Easyship\Exceptions\UnsupportedApiVersionException;
use Easyship\Module;
use Psr\Http\Message\ResponseInterface;

class Tracking extends Module
{
    /**
     * Get shipment tracking status
     *
     * @link https://developers.easyship.com/v1.0/reference#status
     *
     * @param array $payload
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function status(array $payload): ResponseInterface
    {
        if ($this->easyship->getApiVersion() == 1) {
            $endpoint = '/track/v1/status';
        } else {
            throw new UnsupportedApiVersionException();
        }

        return $this->easyship->request('get', $endpoint, $payload);
    }

    /**
     * Get shipment tracking checkpoints
     *
     * @link https://developers.easyship.com/v1.0/reference#checkpoints
     *
     * @param array $payload
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function checkpoints(array $payload): ResponseInterface
    {
        if ($this->easyship->getApiVersion() == 1) {
            $endpoint = '/track/v1/checkpoints';
        } else {
            throw new UnsupportedApiVersionException();
        }

        return $this->easyship->request('get', $endpoint, $payload);
    }
}
